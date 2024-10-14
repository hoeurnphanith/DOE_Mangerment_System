<!-- alert insert -->
<?php
  if(isset($_SESSION['insert'])){
    ?>
    <script>
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
      })

      Toast.fire({
        icon: 'success',
        title: '<?php echo $_SESSION['insert'] ?>'
      })
    </script>
    <?php 
    unset($_SESSION['insert']);
  }
?>
<!-- end alert insert -->


<!-- alert update -->
<?php
  if(isset($_SESSION['update'])){
    ?>
    <script>
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
      })

      Toast.fire({
        icon: 'success',
        title: '<?php echo $_SESSION['update'] ?>'
      })
    </script>
    <?php 
    unset($_SESSION['update']);
  }
?>
<!-- end alert update -->


<!-- alert delete -->
<?php
  if(isset($_SESSION['delete'])){
    ?>
    <script>
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
      })

      Toast.fire({
        icon: 'success',
        title: '<?php echo $_SESSION['delete'] ?>'
      })
    </script>
    <?php 
    unset($_SESSION['delete']);
  }
?>
<!-- end alert delete -->


<!-- alert data -->

<?php
  if(isset($_SESSION['data'])){
    ?>
    <script>
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
      })

      Toast.fire({
        icon: 'warning',
        title: '<?php echo $_SESSION['data'] ?>'
      })
    </script>
    <?php 
    unset($_SESSION['data']);
  }
?>

<?php
  if(isset($_SESSION['fail'])){
    ?>
    <script>
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
      })

      Toast.fire({
        icon: 'warning',
        title: '<?php echo $_SESSION['fail'] ?>'
      })
    </script>
    <?php 
    unset($_SESSION['fail']);
  }
?>
<!-- end alert data -->
