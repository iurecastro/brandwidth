<!DOCTYPE html>
<html lang="en">
<head>
  <?php include './includes/head.php';?>
</head>
<body>
    
<div class="container">
    <div class="container-fluid"><img class="logo" src="images/logo.png"/></div>
    <br/>
        <ul class="nav nav-tabs">
            <li role="presentation" class="active" id="movie"><a href="#">Movie</a></li>
            <li role="presentation" id="tv"><a href="#">TV Shows</a></li>
            <li role="presentation" id="people"><a href="#">People</a></li>
        </ul>
        <div class="container-fluid movie" ><?php include './includes/movie.php';?></div>
        <div class="container-fluid tv"><?php include './includes/tv.php';?></div>
        <div class="container-fluid people"><?php include './includes/people.php';?></div>
</div>
    <br/><br/>
    <div class="panel-footer"><?php include './includes/footer.php';?></div>

</body>
</html>

<script>
$(document).ready( function () {
    $('#table').DataTable();
    $('#tablePeople').DataTable();
    $('#tableTV').DataTable({
        "order": [[ 1, "asc" ]]
    } );
} );
</script>
