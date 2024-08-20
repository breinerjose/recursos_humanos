<title>Turnero Laboratorio Clinico La Castellana</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.Estilo1 {font-size: 18px}
-->
</style>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script>
$(document).ready(function() {
      var refreshId =  setInterval( function(){
    $('#pantalla').load('/Mk_c/trafico/');
   }, 90000 );
});

</script>
</head>
<body>
<div id="pantalla"></div>
</body>
</html>
