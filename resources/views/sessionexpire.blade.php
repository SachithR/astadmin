<!DOCTYPE html>
 
 @include('header')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">

      <div class="error-page">
        <h2 class="headline text-red">440</h2>

        <div class="error-content">
          <h3><i class="fa fa-warning text-red"></i> Session Expire</h3>

          <p>
            <a href="{{url ('/')}}">return to login</a> Please login
          </p>

          <form class="search-form">
            <div class="input-group">
              <input type="text" name="search" class="form-control" placeholder="Search">

              <div class="input-group-btn">
                <button type="submit" name="submit" class="btn btn-danger btn-flat"><i class="fa fa-search"></i>
                </button>
              </div>
            </div>
            <!-- /.input-group -->
          </form>
        </div>
      </div>
      <!-- /.error-page -->

    </section>
 
    <!-- /.content -->
    
  </div>
  <!-- /.content-wrapper -->
   
    @include('footer') 
 
</body>
</html>
      


















 