<aside class="sidebar">
    <div class="sidebar-header">
        <span class="logo-text fw-bold text-primary">Ticket System</span>
    </div>
    <ul class="sidebar-menu">
        <li>
            <a href="{{url('/dashboard')}}" class="menu-item {{request()->is('dashboard') ? 'active' : ''}}">
                <b class="bi bi-speedometer2 menu-icon">
                    <span class="menu-text">Dashboard</span>
                </b>
            </a>
        </li>
        <li>
            <a href="{{url('/tickets')}}" class="menu-item {{request()->is('tickets') ? 'active' : ''}}">
                <b class="bi bi-list-task menu-icon">
                 <span class="menu-text">Ticket List</span>
                </b>
            </a>
        </li>
        <li>
            <a href="" class="menu-item ">
                <b class="bi bi-people menu-icon">
                <span class="menu-text">Users</span>
                </b>
            </a>
        </li>
        <li>
            <a href="" class="menu-item ">
                <b class="bi bi-building-fill">
                 <span class="menu-text">Schools</span>
                </b>
            </a>
        </li>
    </ul>
</aside>
<style>
 .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: var(--sidebar-width);
            height: 100vh;
            background-color:rgb(56, 56, 56);
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
            transition: width var(--transition-speed);
            z-index: 1040;
            overflow: hidden;
 }
  .sidebar-header {
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 30px;
            border-bottom: 1px solid #dee2e6;
           
        }
        .logo-text{
            font-size: 1rem;
        }
        
        .sidebar-menu {
            list-style: none;
            padding: 0;
            margin: 0;
           
        }
        
        .menu-item {
            display: flex;
            align-items: center;
            padding: 12px 15px;
            margin: 5px 10px;
            border-radius: 6px;
            color:rgb(252, 254, 255);
            text-decoration: none;
            transition: all 0.2s;
            white-space: nowrap;
        }
        
        .menu-item:hover {
            background-color: #e9ecef;
            color: #0d6efd;
        }
        
        .menu-item.active {
            background-color: #e7f1ff;
            color: #0d6efd;
        }
        
        .menu-icon {
            font-size: 1.2rem;
            width: 24px;
            margin-right: 15px;
            transition: margin var(--transition-speed);
            text-align: center;
        }
        
        .menu-text {
            transition: opacity var(--transition-speed);
            font-weight: 500;
            font-size: 1rem;
        }
        
        
        /* Main content */
        .main-content {
            margin-top: 80px;
            margin-left: var(--sidebar-width);
            padding: 20px;
            transition: margin-left var(--transition-speed);
        }
</style>
<script>
 // Responsive behavior
            window.addEventListener('resize', function() {
                if (window.innerWidth = 768 && !body.classList.contains('collapsed')) {
                    body.classList.add('collapsed');
                } else if (window.innerWidth > 768 && body.classList.contains('collapsed') && savedState !== 'true') {
                    body.classList.remove('collapsed');
                }
            });
</script>