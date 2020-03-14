<li class="{{ Request::is('employs*') ? 'active' : '' }}">
    <a href="{{ route('employs.index') }}"><i class="fa fa-edit"></i><span>Employs</span></a>
</li>

<li class="{{ Request::is('medicalFields*') ? 'active' : '' }}">
    <a href="{{ route('medicalFields.index') }}"><i class="fa fa-edit"></i><span>Medical Fields</span></a>
</li>

<li class="{{ Request::is('medicalSpecialties*') ? 'active' : '' }}">
    <a href="{{ route('medicalSpecialties.index') }}"><i class="fa fa-edit"></i><span>Medical Specialties</span></a>
</li>

<li class="{{ Request::is('acceptRequestSpecialists*') ? 'active' : '' }}">
    <a href="{{ route('acceptRequestSpecialists.index') }}"><i class="fa fa-edit"></i><span>Accept Request Specialists</span></a>
</li>

<li class="{{ Request::is('requestSpecialists*') ? 'active' : '' }}">
    <a href="{{ route('requestSpecialists.index') }}"><i class="fa fa-edit"></i><span>Request Specialists</span></a>
</li>

<li class="{{ Request::is('wallets*') ? 'active' : '' }}">
    <a href="{{ route('wallets.index') }}"><i class="fa fa-edit"></i><span>Wallets</span></a>
</li>

