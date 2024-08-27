<?php echo '
';
echo '
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="../../img/logo.png" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"><b>SFAC</b> Bacoor</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-header">MAIN NAVIGATION</li>';

        if($_SESSION['role'] == "Administrator"){
                            echo '
          <li class="nav-item menu-open">
            <a href="../dashboard/admin_home.php" class="nav-link active">
              <i class="nav-icon fas fa-home"></i>
              <p>
               Home
              </p>
            </a>

               <li class="nav-item">
            <a href="../book/search_book.php" class="nav-link">
              <i class="nav-icon fa fa-book"></i>
              <p>
                  Search Book
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="../ebook/search_ebook.php" class="nav-link">
              <i class="nav-icon fa fa-book"></i>
              <p>
                  Search E-Book
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Special Collection
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../thesis/thesis.php" class="nav-link">
                  <i class="fas fa-search nav-icon"></i>
                  <p>Search Special Collection</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../thesis/add_thesis.php" class="nav-link">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>Add Special Collection</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="../thesis/borrow_collection.php" class="nav-link">
                  <i class="fas fa-shopping-cart nav-icon"></i>
                  <p> Special Collection Checkout</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../category/add_category.php" class="nav-link">
                  <i class="fas fa-list nav-icon"></i>
                  <p> Categories</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../course/add_course.php" class="nav-link">
                  <i class="fas fa-list nav-icon"></i>
                  <p>Courses</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Article Index
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../article/article.php" class="nav-link">
                  <i class="fas fa-search nav-icon"></i>
                  <p>Search Articles</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../article/add_article.php" class="nav-link">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>Add Article</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="../article/borrow_article.php" class="nav-link">
                  <i class="fas fa-shopping-cart nav-icon"></i>
                  <p> Article Checkout</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../period_title/add_pt.php" class="nav-link">
                  <i class="fas fa-list nav-icon"></i>
                  <p>Periodical Title</p>
                </a>
              </li>
            </ul>
          </li>

        <li class="nav-header">USER MAINTENANCE</li>
                  <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Users
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../users/user.php" class="nav-link">
                  <i class="fas fa-user nav-icon"></i>
                  <p>Search User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../users/add_user.php" class="nav-link">
                  <i class="fas fa-user-plus nav-icon"></i>
                  <p>Add User</p>
                </a>
              </li>
            </ul>
          </li>

           <li class="nav-header">GUEST MAINTENANCE</li>
                  <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Guest
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../dashboard/guest.php" class="nav-link">
                  <i class="fas fa-user nav-icon"></i>
                  <p>Search Guest</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../dashboard/add_guest.php" class="nav-link">
                  <i class="fas fa-user-plus nav-icon"></i>
                  <p>Add Guest</p>
                </a>
              </li>
            </ul>
          </li>

           <li class="nav-header">BOOK MAINTENANCE</li>
                  <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Books & E-Books
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../book/book.php" class="nav-link">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>Add Book</p>
                </a>
              </li>';
if ($_SESSION['userid'] == 99) {
              echo '<li class="nav-item">
                <a href="../ebook/ebook.php" class="nav-link">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>Add E-Book</p>
                </a>
              </li>'; }

              echo '<li class="nav-item">
                <a href="../moa/moa.php" class="nav-link">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>Mode Of Acquisition</p>
                </a>
              </li>
                 <li class="nav-item">
                <a href="../publisher/publisher.php" class="nav-link">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>Publisher</p>
                </a>
              </li>
                 <li class="nav-item">
                <a href="../pop/pop.php" class="nav-link">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>Place of Publication</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../campus/campus.php" class="nav-link">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>Campus</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../department/department.php" class="nav-link">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>Department</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">LIBRARY SERVICES</li>
                  <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
               Borrowing Services
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../borrow/borrow.php" class="nav-link">
                  <i class="fas fa-shopping-cart nav-icon"></i>
                  <p>Reader Check-out</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../settings/settings.php" class="nav-link">
                  <i class="fas fa-list nav-icon"></i>
                  <p>Settings</p>
                </a>
              </li>
              
            </ul>
          </li>


            <li class="nav-header">SUMMARY REPORTS</li>
           <li class="nav-item">
            <a href="../borrow/borrowed_book.php" class="nav-link">
              <i class="nav-icon fa fa-book"></i>
              <p>
                  Borrowed Books
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="../borrow/returned_book.php" class="nav-link">
              <i class="nav-icon fa fa-book"></i>
              <p>
                  Returned Books
              </p>
            </a>
          </li>';

       if ($_SESSION['userid'] == 99) {  
            echo '

           <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
              Utilization Records
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../utilization/utilization_record.php" class="nav-link">
                  <i class="fas fa-check nav-icon"></i>
                  <p>Active Records</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../utilization/inactive_records.php" class="nav-link">
                  <i class="fas fa-times nav-icon"></i>
                  <p>Inactive Records</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../utilization/inventory.php" class="nav-link">
                  <i class="fas fa-briefcase nav-icon"></i>
                  <p>Inventory</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
              Archives
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../archives/archives.php" class="nav-link">
                  <i class="fas fa-search nav-icon"></i>
                  <p>Inactive Books</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../archives/arc_thesis.php" class="nav-link">
                  <i class="fas fa-search nav-icon"></i>
                  <p>Inactive Collection</p>
                </a>
              </li>
            </ul>
          </li>

            <li class="nav-header">DATABASE MAINTENANCE</li>
           <li class="nav-item">
            <a href="../database/backup.php" class="nav-link">
              <i class="nav-icon fa fa-database"></i>
              <p>
                 Backup Database
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="../database/restore.php" class="nav-link">
              <i class="nav-icon fa fa-database"></i>
              <p>
                  Restore Database
              </p>
            </a>
          </li>';
} }
 elseif($_SESSION['role'] == "Student"){
                            echo '
          <li class="nav-item menu-open">
            <a href="../dashboard/user_home.php" class="nav-link active">
              <i class="nav-icon fas fa-home"></i>
              <p>
               Home
              </p>
            </a>

          <li class="nav-item">
            <a href="../book/search_book.php" class="nav-link">
              <i class="nav-icon fa fa-search"></i>
              <p>
                  Search Book
              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="../ebook/search_ebook.php" class="nav-link">
              <i class="nav-icon fa fa-search"></i>
              <p>
                  Search E-Book
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="../thesis/thesis.php" class="nav-link">
              <i class="nav-icon fa fa-search"></i>
              <p>
                  Search Special Collection
              </p>
            </a>
          </li>

            <li class="nav-item">
            <a href="../archives/archives.php" class="nav-link">
              <i class="nav-icon fa fa-search"></i>
              <p>
                  Search Archived Book
              </p>
            </a>
          </li>


           <li class="nav-item">
            <a href="../users/userborrow.php" class="nav-link">
              <i class="nav-icon fa fa-book"></i>
              <p>
                  Borrowed Books
              </p>
            </a>
          </li>

            <li class="nav-item">
            <a href="../users/userhistory.php" class="nav-link">
              <i class="nav-icon fa fa-book"></i>
              <p>
                 Borrow History
              </p>
            </a>
          </li>';
}
 elseif($_SESSION['role'] == "Super Admin"){
                            echo '
          <li class="nav-item menu-open">
            <a href="../dashboard/super_admin_home.php" class="nav-link active">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>

          <li class="nav-item">
            <a href="../book/search_book.php" class="nav-link">
              <i class="nav-icon fa fa-book"></i>
              <p>
                  Search Book
              </p>
            </a>
          </li>

        <li class="nav-header">LIBRARIAN MAINTENANCE</li>
           <li class="nav-item">
            <a href="../admin/add_librarian.php" class="nav-link">
              <i class="nav-icon fa fa-user-plus"></i>
              <p>
                  Add Librarians
              </p>
            </a>
          </li>

            <li class="nav-item">
            <a href="../admin/librarian_list.php" class="nav-link">
              <i class="nav-icon fa fa-user"></i>
              <p>
                 List of Librarians
              </p>
            </a>
          </li>

            <li class="nav-header">DATABASE MAINTENANCE</li>
           <li class="nav-item">
            <a href="../database/backup.php" class="nav-link">
              <i class="nav-icon fa fa-database"></i>
              <p>
                  Backup Database
              </p>
            </a>
          </li>

            <li class="nav-item">
            <a href="../database/restore.php" class="nav-link">
              <i class="nav-icon fa fa-database"></i>
              <p>
                 Restore Database
              </p>
            </a>
          </li>';

}
 elseif($_SESSION['role'] == "Guest"){
                            echo '
         <li class="nav-item menu-open">
            <a href="guest_home.php" class="nav-link active">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>

           <li class="nav-item">
            <a href="guestbook.php" class="nav-link">
              <i class="nav-icon fa fa-book"></i>
              <p>
                  Book List
              </p>
            </a>
          </li>

           <li class="nav-item">
            <a href="guestebook.php" class="nav-link">
              <i class="nav-icon fa fa-book"></i>
              <p>
                  E-Book List
              </p>
            </a>
          </li>

         <li class="nav-item">
            <a href="guest_borrowed_list.php" class="nav-link">
              <i class="nav-icon fa fa-book"></i>
              <p>
                  Borrowed Book List
              </p>
            </a>
          </li>

           <li class="nav-item">
            <a href="guest_returned_list.php" class="nav-link">
              <i class="nav-icon fa fa-book"></i>
              <p>
                  Returned Book List
              </p>
            </a>
          </li>

            ';
       }
      echo '  
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>';

  ?>
