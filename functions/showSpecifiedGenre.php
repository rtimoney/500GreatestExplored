<?php


$search = $_POST['id'];

$query = "SELECT album.album_id, album.album_name, release_year.album_release_year, artist.artist_name, genre.genre_name FROM album INNER JOIN release_year ON album.album_year = release_year.year_id INNER JOIN artist ON album.album_artist = artist.artist_id INNER JOIN album_genre ON album.album_id = album_genre.album_id INNER JOIN genre ON album_genre.genre_id = genre.genre_id WHERE genre.genre_name LIKE";
$endpoint = "http://rtimoney02.webhosting6.eeecs.qub.ac.uk/project500ForServer/functions/api.php?custom1&query=".urlencode($query)."&search=".urlencode($search);
echo $endpoint;
$resource = file_get_contents($endpoint);
$runCheck = json_decode( preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $resource), true );

foreach($runCheck as $rows){


   
?>


<tr>
<td><?php echo $rows['genre_name']; ?> </td>
<td><?php echo $rows['album_release_year']; ?> </td>
<td><?php echo $rows['artist_name']; ?> </td>
<td><?php echo $rows['album_name']; ?> </td>
<td><?php echo $rows['album_id']; ?> </td>
</tr>

<?php

}



?>