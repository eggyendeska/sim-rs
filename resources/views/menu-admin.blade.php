					<div id="navigation">
                        <!-- Navigation Menu-->
                        <ul class="navigation-menu">
                            <li class="{{ Request::is('home') ? 'active' : '' }}">
                                <a href="{{ url('home') }}"><i class="zmdi zmdi-view-dashboard"></i> <span> Home </span> </a>
                            </li>
                            <li class="{{ Request::is('user','user/register') ? 'active' : '' }}">
                                <a href="{{ url('user') }}"><i class="fa fa-user"></i> <span> User </span> </a>
                            </li>
                            <li class="{{ Request::is('obat','obat/create') ? 'active' : '' }}">
                                <a href="{{ url('obat') }}"><i class="fa fa-medkit"></i> <span> Obat </span> </a>
                            </li>

                            <li class="has-submenu">
                                <a href="#"><i class="zmdi zmdi-collection-text"></i><span> Forms </span> </a>
                                <ul class="submenu">
                                    <li><a href="form-elements.html">General Elements</a></li>
                                    <li><a href="form-advanced.html">Advanced Form</a></li>
                                    <li><a href="form-validation.html">Form Validation</a></li>
                                    <li><a href="form-wizard.html">Form Wizard</a></li>
                                    <li><a href="form-fileupload.html">Form Uploads</a></li>
                                    <li><a href="form-wysiwig.html">Wysiwig Editors</a></li>
                                    <li><a href="form-xeditable.html">X-editable</a></li>
                                </ul>
                            </li>
                        </ul>
                        <!-- End navigation menu  -->
                    </div>