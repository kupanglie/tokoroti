<aside class="main-sidebar hidden-print">
  <section class="sidebar">
    <!-- Sidebar Menu-->
    <ul class="sidebar-menu">
      <li class="{{ isActiveURL('/', $output = "active") }}"><a href="/"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
      <li class="{{ isActiveRoute('transactions.*', $output = "active") }}"><a href="{{ route('transactions.index') }}"><i class="fa fa-money"></i><span>Transaksi</span></a></li>
      <li class="treeview {{ areActiveRoutes(['cars-management.*', 'dropoff-stores-management.*', 'items-management.*', 'workers-management.*'], $output = "active") }}"><a href="#"><i class="fa fa-gears"></i><span>Pengaturan</span><i class="fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
          <li class="{{ isActiveRoute('cars-management.*', $output = "active") }}"><a href="{{ route('cars-management.index') }}"><i class="fa fa-circle-o"></i> Pengelolaan Mobil </a></li>
          <li class="{{ isActiveRoute('dropoff-stores-management.*', $output = "active") }}"><a href="{{ route('dropoff-stores-management.index') }}"><i class="fa fa-circle-o"></i> Pengelolaan Toko Pengecer</a></li>
          <li class="{{ isActiveRoute('items-management.*', $output = "active") }}"><a href="{{ route('items-management.index') }}"><i class="fa fa-circle-o"></i> Pengelolaan Barang</a></li>
          <li class="{{ isActiveRoute('workers-management.*', $output = "active") }}"><a href="{{ route('workers-management.index') }}"><i class="fa fa-circle-o"></i> Pengelolaan Pekerja</a></li>
        </ul>
      </li>
    </ul>
  </section>
</aside>