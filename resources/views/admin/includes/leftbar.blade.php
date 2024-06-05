	<nav class="ts-sidebar">
			<ul class="ts-sidebar-menu">

				<li class="ts-label">Main</li>
				<li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				<li><a href="{{ route('reservations') }}"><i class="fa fa-dashboard"></i> Réservation</a></li>

<li><a href="{{ route('allcars') }}"><i class="fa fa-sitemap"></i> Vehicles</a>
				</li>



				<li><a href="{{ route('registered.users') }}"><i class="fa fa-users"></i>Utilisateurs</a></li>

				{{-- <li><a href="{{ route('contactlist') }}"><i class="fa fa-files-o"></i>Lists des messages</a></li> --}}


			</ul>
		</nav>
