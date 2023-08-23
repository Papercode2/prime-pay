<body style="background-color:powderblue;">
<table>
  <tr>
    <th>Transaction ID</th>
    <th>Date</th>
    <th>Amount</th>
    <th>Description</th>
  </tr>
  <?php
    // Connect to the database
    $conn = mysqli_connect("localhost", "root", "", "guestbook");

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Query to retrieve TinyPesa records
    $sql = "SELECT * FROM tiny_pesa_records";
    $result = mysqli_query($conn, $sql);

    // Loop through the records and display in the table
    while($row = mysqli_fetch_assoc($result)) {
      echo "<tr>";
      echo "<td>" . $row['transaction_id'] . "</td>";
      echo "<td>" . $row['date'] . "</td>";
      echo "<td>" . $row['amount'] . "</td>";
      echo "<td>" . $row['description'] . "</td>";
      echo "</tr>";
    }

    // Close the database connection
    mysqli_close($conn);
  ?>
</table>
<?php
  // Connect to the database
  $conn = mysqli_connect("localhost", "root", "", "guestbook");

  // Check connection
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }

  // Function to retrieve the TinyPesa records using their API
  function retrieve_tiny_pesa_records_from_api() {
    // Replace this with your actual code to retrieve the records from the TinyPesa API
    return [
      [
        'transaction_code' => 'TX001',
        'date' => '2022-12-01 10:00:00',
        'amount' => 100.00,
        'description' => 'Payment for Invoice 123'
      ],
      [
        'transaction_code' => 'TX002',
        'date' => '2022-12-02 11:00:00',
        'amount' => 200.00,
        'description' => 'Payment for Invoice 456'
      ],
      [
        'transaction_code' => 'TX003',
        'date' => '2022-12-03 12:00:00',
        'amount' => 300.00,
        'description' => 'Payment for Invoice 789'
      ],
    ];
  }

  // Retrieve the TinyPesa records using their API
  $tiny_pesa_records = retrieve_tiny_pesa_records_from_api();

  // Loop through the records and insert into the database
  foreach ($tiny_pesa_records as $record) {
    $transaction_id = $record['transaction_code'];
    $date = $record['date'];
    $amount = $record['amount'];
    $description = $record['description'];

    $sql = "INSERT INTO tiny_pesa_records (transaction_id, date, amount, description)
            VALUES ('$transaction_id', '$date', '$amount', '$description')";
    if (!mysqli_query($conn, $sql)) {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  }

  // Close the database connection
  mysqli_close($conn);
?>
