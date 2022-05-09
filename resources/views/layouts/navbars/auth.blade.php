<div class="sidebar" data-color="verde" data-active-color="info">
    <br>
    <br>
   
    <br>
    <br>
    <div class="sidebar-wrapper">

        <ul class="nav">
            <li class="{{ $elementActive == 'dashboard' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'dashboard') }}">
                    <img class="icon" src="{{ asset('paper') }}/icons/" alt="">
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'user' || $elementActive == 'profile' ? 'active' : '' }}">
                <a data-toggle="collapse" aria-expanded="true" href="#laravelExamples">
                    <img class="icon" src="{{ asset('paper') }}/icons/Icon_user.svg" alt="">
                        
                    <p>
                            {{ __('Gestión de usuario') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse show" id="laravelExamples">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'profile' ? 'active' : '' }}">
                            <a href="{{ route('profile.edit') }}">
                                <img class="icon" src="{{ asset('paper') }}/icons/" alt="">
                                <span class="sidebar-normal">{{ __(' Mi perfil ') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == '' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'User') }}">
                                <img class="icon" src="{{ asset('paper') }}/icons/" alt="">
                                <span class="sidebar-normal">{{ __('Usuarios') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'tipo' ? 'active' : '' }}">
                            <a href="{{route('TipoUsuario.index')}}">
                                <img class="icon" src="{{ asset('paper') }}/icons/" alt="">
                                <span class="sidebar-normal">{{ __('Tipo Usuario') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="{{ $elementActive == '' || $elementActive == 'profile' ? 'active' : '' }}">
                <a data-toggle="collapse" aria-expanded="true" href="#laravelExamples2">
                    <img class="icon" src="{{ asset('paper') }}/icons/" alt="">
                    <p>
                            {{ __('Clientes') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse show" id="laravelExamples2">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'Activos' ? 'active' : '' }}">
                            <a href="{{ route('Cliente.index') }}">
                                <img class="icon" src="{{ asset('paper') }}/icons/" alt="">
                                <p>{{ __('Cliente') }}</p>
                            </a>
                        </li>
                        <li class="{{ $elementActive == '' ? 'active' : '' }}">
                            <a href="{{route('Cliente.listarInactivos')}}">
                                <img class="icon" src="{{ asset('paper') }}/icons/" alt="">
                                <span class="sidebar-normal">{{ __(' Inactivos sin causa') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'inactivos' ? 'active' : '' }}">
                            <a href="{{route('Cliente.inactivos')}}">
                                <img class="icon" src="{{ asset('paper') }}/icons/" alt="">
                                <span class="sidebar-normal">{{ __('Clientes Inactivos') }}</span>
                            </a>
                        </li>
                        
                    </ul>
                </div>
            </li>
            
        
            <li class="{{ $elementActive == '' || $elementActive == 'profile' ? 'active' : '' }}">
                <a data-toggle="collapse" aria-expanded="true" href="#laravelExamples3">
                    <img class="icon" src="{{ asset('paper') }}/icons/" alt="">
                    <p>
                            {{ __('Macros Intercom') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse show" id="laravelExamples3">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'macros' ? 'active' : '' }}">
                            <a href="{{ route('MacrosIntercom.index')}}">
                                <img class="icon" src="{{ asset('paper') }}/icons/" alt="">
                                <p>{{ __('Macros Itercom B2B') }}</p>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'macrosB2C' ? 'active' : '' }}">
                            <a href="{{ route('MacrosIntercom.grupobtc')}}">
                                <img class="icon" src="{{ asset('paper') }}/icons/" alt="">
                                <p>{{ __('Macros Itercom B2C') }}</p>
                            </a>
                        </li>
                        <li class="{{ $elementActive == '' ? 'active' : '' }}">
                            <a href="{{route('MacrosIntercom.misMacros')}}">
                                <img class="icon" src="{{ asset('paper') }}/icons/" alt="">
                                <span class="sidebar-normal">{{ __('Mis macros') }}</span>
                            </a>
                        </li>
                        
                    </ul>
                </div>
            </li>
            
            <li class="{{ $elementActive == '' || $elementActive == 'profile' ? 'active' : '' }}">
                <a data-toggle="collapse" aria-expanded="true" href="#laravelExamples4">
                    <img class="icon" src="{{ asset('paper') }}/icons/" alt="">
                    <p>
                            {{ __('Macros Zendesk') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse show" id="laravelExamples4">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'macrosZendesk' ? 'active' : '' }}">
                            <a href="{{ route('MacrosZendesk.index')}}">
                                <img class="icon" src="{{ asset('paper') }}/icons/" alt="">
                                <p>{{ __('Macros Zendesk B2B') }}</p>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'macrosZendeskbtc' ? 'active' : '' }}">
                            <a href="{{ route('MacrosZendesk.grupobtc')}}">
                                <img class="icon" src="{{ asset('paper') }}/icons/" alt="">
                                <p>{{ __('Macros Zendesk B2C') }}</p>
                            </a>
                        </li>
                        <li class="{{ $elementActive == '' ? 'active' : '' }}">
                            <a href="{{route('MacrosZendesk.misMacros')}}">
                                <img class="icon" src="{{ asset('paper') }}/icons/" alt="">
                                <span class="sidebar-normal">{{ __('Mis macros') }}</span>
                            </a>
                        </li>
                        
                    </ul>
                </div>
            </li>
             
            <li class="{{ $elementActive == '' || $elementActive == 'profile' ? 'active' : '' }}">
                <a data-toggle="collapse" aria-expanded="true" href="#laravelExamples5">
                    <img class="icon" src="{{ asset('paper') }}/icons/" alt="">
                    <p>
                            {{ __('Asignación cliente') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse show" id="laravelExamples5">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'asignados' ? 'active' : '' }}">
                            <a href="{{ route('Asignacion.index')}}">
                                <img class="icon" src="{{ asset('paper') }}/icons/" alt="">
                                <p>{{ __('Enterprise') }}</p>
                            </a>
                        </li>
                        <li class="{{ $elementActive == '' ? 'active' : '' }}">
                            <a href="{{ route('Asignacion.miAsignado')}}">
                                <img class="icon" src="{{ asset('paper') }}/icons/" alt="">
                                <p>{{ __('Mis asignados') }}</p>
                            </a>
                        </li>                
                    </ul>
                </div>
            </li>
        </ul>
    </div>
    <br>
</div>
<script src="{{ asset('js/app.js') }}"></script>