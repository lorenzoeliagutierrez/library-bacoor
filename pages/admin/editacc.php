<?php

include ('../../includes/conn.php');

    // $selectbook = mysqli_query($con, "SELECT * FROM book");
    // while ($row = mysqli_fetch_array($selectbook)) {
        
    //     $newaccession = 'HBA'.$row['accession_no'];
        
    //     $updatebook = mysqli_query($con, "UPDATE book SET accession_no = '$newaccession' WHERE book_id = '$row[book_id]'");
    // }
    
    $selectbook = mysqli_query($con, "SELECT * FROM book WHERE campus_id = '4'");
    while ($row = mysqli_fetch_array($selectbook)) {
        $prevaccession = $row['accession_no'];
        $accession = substr($prevaccession, 3);
        $newaccession = 'HLP'.$accession;
        
        $updatebook = mysqli_query($con, "UPDATE book SET accession_no = '$newaccession' WHERE book_id = '$row[book_id]'");
    }
?>