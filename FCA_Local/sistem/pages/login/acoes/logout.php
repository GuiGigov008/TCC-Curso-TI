<?php
session_start();
session_destroy();


echo "<script> alert('Sessão encerrada.') </script>
                <meta http-equiv='refresh'>";
echo "<script>window.location = '../index.php'</script>";
