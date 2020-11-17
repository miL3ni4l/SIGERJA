<ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="user-wrapper">
                <div class="profile-image">
                @if(Auth::user()->gambar == '')

                  <img src="{{asset('images/user/default.png')}}" alt="profile image">
                @else

                  <img src="{{asset('images/user/'. Auth::user()->gambar)}}" alt="profile image">
                @endif
                </div>
                <div class="text-wrapper">
                  <p class="profile-name">{{Auth::user()->name}}</p>
                  <div>
                    <small class="designation text-muted" style="text-transform: uppercase;letter-spacing: 1px;">{{ Auth::user()->level }}</small>
                    <span class="status-indicator online"></span>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li class="nav-item {{ setActive(['/', 'home']) }}"> 
            <a class="nav-link" href="{{url('/')}}">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
         
           
          @if(Auth::user()->level == 'admin')
          <li class="nav-item {{ setActive(['Anggota*', 'acara*', 'user*']) }}">
            <a class="nav-link " data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-content-copy"></i>
              <span class="menu-title">Master Data</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ setShow(['Anggota*', 'acara*', 'user*']) }}" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                
                <li class="nav-item">
                  <a class="nav-link {{ setActive(['anggota*']) }}" href="{{route('anggota.index')}}">Data Anggota</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{ setActive(['talenta*']) }}" href="{{route('talenta.index')}}">Data Pelayanan</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{ setActive(['user*']) }}" href="{{route('user.index')}}">Data Pengguna</a>
                </li>
              </ul>
            </div>
          </li>
          
          <li class="nav-item {{ setActive(['/export', 'export']) }}"> 
            <a class="nav-link" href="{{url('/export')}}">
              <i class="menu-icon mdi mdi-cloud-download"></i>
              <span class="menu-title">Laporan</span>
            </a>
          </li>
           
          @else
          <li class="nav-item {{ setActive(['Anggota*', 'acara*', 'user*']) }}">
            <a class="nav-link " data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-content-copy"></i>
              <span class="menu-title">Master Data</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ setShow(['Anggota*', 'acara*', 'user*']) }}" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                
                <li class="nav-item">
                  <a class="nav-link {{ setActive(['acara*']) }}" href="{{route('list.index')}}">Data Acara</a>
                </li>
                 <li class="nav-item">
                  <a class="nav-link {{ setActive(['transaksi*']) }}" href="{{route('transaksi.index')}}">Data Donasi</a>
                </li>
              </ul>
            </div>
          </li>
          @endif
         
        </ul>