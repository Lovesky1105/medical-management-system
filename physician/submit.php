<html>
	<head>
		<meta http-equiv="Pragma" content="no-cache">
		<style type="text/css"> 
		    body{    
		    font-family: sans-serif;
		    margin:0;
		    padding:0;
			}
			.container {
			    position: relative;
			    max-height: 100vh;
    			max-width: 100vw;
			}
			.wrapper {
			    position: relative;
			    margin-top: 2em;
			}
			.loader,.loader2,h2{
				right: 25%;
			}
      .loader,.loader2,h2{
				right: 25%;
			}
			@media screen and (max-width: 370px) {
				.loader,.loader2,h2{
					right: 14%;
        }
			}
			h2{
				text-align: right;
			    margin-right: 41px;
			    position: absolute;
			    margin-top: -10px;
			    font-size: 20px;
			    margin-top: 87px;
			    color: #353535;
			    padding-left:10px;
			}
			
			.loader {
				border: 3px solid #f78344;
			    border-radius: 50%;
			    border-top: 6px solid #fcd0b8;
			    width: 70px;
			    height: 67px;
			    position: absolute;
				-webkit-animation: spin 2s linear infinite;
				animation: spin 2s linear infinite;
			}
			.loader2 {
			    border: 3px solid #ad1659;
			    border-radius: 50%;
			    border-top: 6px solid #f69bc3;
			    width: 70px;
			    height: 67px;
			    position: absolute;
			    margin-right: -36px;
			    top: 30px;
			    -webkit-animation: spin 2s linear infinite;
			    animation: spin 2.6s linear infinite;
			}

			@-webkit-keyframes spin {
			  0% { -webkit-transform: rotate(0deg); }
			  100% { -webkit-transform: rotate(360deg); }
			}

			@keyframes spin {
			  0% { transform: rotate(0deg); }
			  100% { transform: rotate(360deg); }
			}
		</style>
	</head>
    <body>
    	<div class="container">
	    	<div class="wrapper">
		    	<div class="loader"></div>
		    	<div class="loader2"></div>
				<h2>successfully submit. pendding for approve&nbsp;...</h2>
        <button><a href="phyLoginForm.php">Login page</a></button>
			</div>
      
		</div>
    
       
    </body>
</html>
