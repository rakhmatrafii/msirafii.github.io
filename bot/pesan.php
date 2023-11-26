<?php
// koneksi ke database
$conn = new mysqli("localhost", "root", "", "bot") or die("Database Error");

// get pesan dari user
$getMesg = $conn->real_escape_string($_POST['text']);

// cek user query dengan yang ada di database
$check_data = "SELECT replies FROM chatbot WHERE queries LIKE '%$getMesg%'";
$run_query = $conn->query($check_data) or die("Error");

// jika query user sama dengan yang ada dalam database maka akan dibalas sesuai query-nya
if($run_query->num_rows > 0){
    $fetch_data = $run_query->fetch_assoc(); // perbaiki tanda panah di sini
    // menyimpan balasan ke variabel yang kemudian dikirimkan ke ajax
    $reply = $fetch_data['replies'];
    echo $reply;
} else {
    echo "Maaf, kami tidak paham maksud anda!";
}
?>
