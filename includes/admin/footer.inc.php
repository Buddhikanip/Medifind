</main>
<!--Main layout-->
  <!-- MDB -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.js"></script>

  <?php 
    if(isset($_SESSION["uname"]))
    {// 900000
        echo "
        <script>
            setTimeout(logout,900000);
            function logout(){
                window.location ='../includes/admin/auto.inc.php' ;
            }
        </script>";
    }
?>  

</body>
</html>