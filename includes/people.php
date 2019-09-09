<?php
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://api.themoviedb.org/3/person/popular?page=1&language=en-US&api_key=d0aea524bd07ed49cbc26dff63f357dd",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_POSTFIELDS => "{}",
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
 ?>
<h2>People</h2>
 <table id="tablePeople" class="table table-hover table-striped">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>PICTURE</th>
            <th>NAME</th>
        </tr>
    </thead>
    <tbody>
<?php 
 $result = json_decode($response, true); 
 $cont = count($result['results']);
// var_dump($result);
 for($i=0;$i<$cont;$i++){

	$array = $result['results'][$i];
//        var_dump($array);
        echo '<tr>';
	foreach($array as $index => $value){

            switch ($index) {
                
               ############ 
                case "popularity":
                    $popularity = $value;
                    break;
                case "vote_count":
                    $vote_count = $value;
                    break;
                case "video":
                    $video = $value;
                    break;
                case "profile_path":
                    $poster_path=$value;
                     echo '<td><img width="50px" class="rounded" src="https://image.tmdb.org/t/p/w500/'.$value.'" /></td>';
                    break;
                case "id":
                    $id=$value;
                    echo '<td><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#'.$id.'">'.$id.'</button></td>';
                    break;
                case "adult":
                   $adult = $value;
                    break;
                case "backdrop_path":
                   $backdrop_path = $value;
                    break;
                case "original_language":
                   $original_language = $value;
                    break;
                case "original_title":
                   $original_title = $value;
                    break;
                case "genre_ids":
                    $genre_ids = $value;
                    break;
                case "name":
                    $title = $value;
                    echo '<td>'.$value.'</td>';
                    break;
                case "vote_average":
                    $vote_average = $value;
                    break;
                case "overview":
                    $overview = $value;
                    break;
                case "release_date":
                    $release_date = $value;
                    break;
            }
	}
	echo '</tr>';
        
       echo  ' <div class="modal fade" id="'.$id.'" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header panel panel-primary" style="background-color:#337ab7;color:#fff;">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">'.$title.'</h4>
                </div>
                <div class="modal-body">
                  <div class="thumbnail">
                  
                  <img class="figure-img img-fluid rounded" src="https://image.tmdb.org/t/p/w500/'.$poster_path.'"/></div>
                      <h3>Overview</h3>
<div class="caption">'.$overview.'</div>
    
                    <h4>Release Date</h4>
                    '.$release_date.'                        
                <h4>genre_ids</h4>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>

            </div>
          </div>';
 }
 
 ?>
             
    </tbody>
    </table>

 
    <?php
}
