<?php


class Queue
{
    protected $table = 'jobs';

    public function push($job, $data)
    {
        $payload = json_encode($data);

        // Insert the job into the database
        $query = "INSERT INTO {$this->table} (job, payload, status) VALUES (?, ?, ?)";
        $stmt = $this->executeQuery($query, [$job, $payload, 'pending']);

        // Handle any failure in database insertion
        if (!$stmt) {
            throw new Exception('Failed to insert job into database');
        }

        return true;
    }

    public function process()
    {
        // Fetch the next pending job from the database
        $query = "SELECT * FROM {$this->table} WHERE status = 'pending' ORDER BY id ASC LIMIT 1";
        $stmt = $this->executeQuery($query);
        $job = $stmt->fetch();

        // If a job is found, process it
        if ($job) {
            $payload = json_decode($job['payload'], true);

            // Do the actual job processing here...
            $this->performJob($job['job'], $payload);

            // Update the job status to 'completed'
            $updateQuery = "UPDATE {$this->table} SET status = 'completed' WHERE id = ?";
            $this->executeQuery($updateQuery, [$job['id']]);
        }

        return true;
    }

    protected function executeQuery($query, $params = [])
    {
        // Replace this with your own database connection code
        $pdo = new PDO('mysql:host=localhost;dbname=your_database', 'your_username', 'your_password');
        $stmt = $pdo->prepare($query);
        $stmt->execute($params);

        return $stmt;
    }

    protected function performJob($job, $payload)
    {
        // Replace this with your own job processing logic
        // For example, you can call a specific function based on the job type
        switch ($job) {
            case 'send_email':
                $this->sendEmail($payload);
                break;
            case 'process_data':
                $this->processData($payload);
                break;
            // Add more cases for different job types
        }
    }

    protected function sendEmail($payload)
    {
        // Replace this with your own email sending logic
        // Use the payload data to customize the email content and recipient
        echo "Sending email to: " . $payload['email'] . " with content: " . $payload['content'] . "\n";
    }

    protected function processData($payload)
    {
        // Replace this with your own data processing logic
        // Use the payload data to process the necessary data
        echo "Processing data: " . $payload['data'] . "\n";
    }
}

// Usage example:
//$queue = new Queue();

// Push a job to the queue
//$data = [
//    'email' => 'john@example.com',
//    'content' => 'Hello, John!'
//];
//$queue->push('send_email', $data);
//
//$data = [
//    'data' => 'Some important data'
//];
////$queue->push('process_data', $data);

// Process the queue
//$queue->process();