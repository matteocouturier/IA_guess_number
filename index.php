<!DOCTYPE html>
<head>
	<meta charset='UTF-8' />
	
	<title>Drawing Table</title>
	
	<link rel='stylesheet' href='css/colorpicker.css' />
    <link rel='stylesheet' href='css/style.css' />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
	<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js'></script>
	<script src='js/colorpicker.js'></script>
	<script src='js/drawingtable.js'></script>
</head>
<style>
    table{
    width: 100%;
    height: 50%;
}
    input{
        width: 10%;
        height: 10%;
        font-size: 16px;
        margin-bottom: 10px;
        margin-top:10px;
    }
    body{
        background-color: #2D2D2D;
    }
</style>
<body>


	<form action="learn.php" method="post" >
        <center>
		<div id="table-wrap">
			<table id="drawing-table">
				<tr>
					<td></td>
				</tr>
			</table>
		</div>

		<input type="submit" class="btn btn-info" name="num"value="1">
        <input type="submit" class="btn btn-info" name="num"value="2">
        <input type="submit" class="btn btn-info" name="num"value="3">
        <br>
        <input type="submit" class="btn btn-info" name="num"value="4">
        <input type="submit" class="btn btn-info" name="num"value="5">
        <input type="submit" class="btn btn-info" name="num"value="6">
        <br>
        <input type="submit" class="btn btn-info" name="num"value="7">
        <input type="submit" class="btn btn-info" name="num"value="8">
        <input type="submit" class="btn btn-info" name="num"value="9">
        <br>
	</form>
	</div>


    <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
        <div class="card-header">Valeur trouvée</div>
        <div class="card-body">
            <h5 id="txtHint" class="card-title"></h5>

        </div>
    </div>

    </center>
</body>


</html>