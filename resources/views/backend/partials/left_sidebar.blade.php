<!-- Sidebar Menu -->
<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

    <li class="nav-item has-treeview">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-copy"></i>
        <p>
          Manage User
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{ route('user.view') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>View User</p>
          </a>
        </li>
      </ul>
    </li>

    <li class="nav-item has-treeview">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-copy"></i>
        <p>
          Manage Profile
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{ route('profile.view') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Your Profile</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('password.edit') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Change Password</p>
          </a>
        </li>        
      </ul>
    </li> 

    <li class="nav-item has-treeview">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-copy"></i>
        <p>
          Manage Supplier
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{ route('supplier.view') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>View Supplier</p>
          </a>
        </li>
      </ul>
    </li>

    <li class="nav-item has-treeview">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-copy"></i>
        <p>
          Manage Customer
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{ route('customer.view') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>View Customer</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('customer.credit') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Credit Customer</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('customer.paid') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Paid Customer</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('customer.wise.report') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Customer Wise Report</p>
          </a>
        </li>                 
      </ul>
    </li>

    <li class="nav-item has-treeview">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-copy"></i>
        <p>
          Manage Units
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{ route('unit.view') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>View Units</p>
          </a>
        </li>
      </ul>
    </li>

    <li class="nav-item has-treeview">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-copy"></i>
        <p>
          Manage Category
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{ route('category.view') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>View Category</p>
          </a>
        </li>
      </ul>
    </li>

    <li class="nav-item has-treeview">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-copy"></i>
        <p>
          Manage Product
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{ route('product.view') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>View Product</p>
          </a>
        </li>
      </ul>
    </li>

    <li class="nav-item has-treeview">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-copy"></i>
        <p>
          Manage Purchase
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{ route('purchase.view') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>View Purchase</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('purchase.pending') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Pending Purchase</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('purchase.report') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Daily Purchase Report</p>
          </a>
        </li>         
      </ul>
    </li>

    <li class="nav-item has-treeview">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-copy"></i>
        <p>
          Manage Invoice
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{ route('invoice.view') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>View Invoice</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('invoice.pending') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Pending Invoice</p>
          </a>
        </li>    
        <li class="nav-item">
          <a href="{{ route('invoice.print.list') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Print Invoice</p>
          </a>
        </li>          
        <li class="nav-item">
          <a href="{{ route('invoice.daily.report') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Daily Invoice Report</p>
          </a>
        </li>  
      </ul>
    </li>

    <li class="nav-item has-treeview">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-copy"></i>
        <p>
          Manage Stock
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{ route('stock.report') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Stock Report</p>
          </a>
        </li> 
        <li class="nav-item">
          <a href="{{ route('stock.report.supplier.product.wise') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Supplier/Product Wise</p>
          </a>
        </li>  
      </ul>
    </li>

  </ul>
</nav>
<!-- /.sidebar-menu -->
 