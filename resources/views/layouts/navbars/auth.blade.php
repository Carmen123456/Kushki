<div class="sidebar" data-color="verde" data-active-color="info">
    <br>
    <br>

    <br>
    <br>
    <div class="sidebar-wrapper">

        <ul class="nav">
            <li class="{{ $elementActive == 'dashboard' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'dashboard') }}">
                    <img class="icon" src="{{ asset('paper') }}/icons/Spot icon_casa.svg" alt="">
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'profile'|| $elementActive == 'tipo' || $elementActive == 'usuarios' ? 'active' : '' }}">
                <a data-toggle="collapse" aria-expanded="false" class="collapsed" href="#usuarios">
                    <img class="icon" src="{{ asset('paper') }}/icons/Spot_icon_perfil.svg" alt="">

                    <p>
                        {{ __('Gestión de usuario') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="usuarios">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'profile' ? 'active' : '' }}">
                            <a href="{{ route('profile.edit') }}">
                                <span class="sidebar-normal">{{ __(' Mi perfil ') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'usuarios' ? 'active' : '' }}">
                            @can('Mirar usuarios')
                                <a href="{{ route('page.index', 'User') }}">
                                    <span class="sidebar-normal">{{ __('Usuarios') }}</span>
                                </a>
                            @endcan
                        </li>
                        <li class="{{ $elementActive == 'tipo' ? 'active' : '' }}">
                            @can('Mirar usuarios')
                                <a href="{{ route('Role.index') }}">
                                    <span class="sidebar-normal">{{ __('Tipo Usuario') }}</span>
                                </a>
                            @endcan
                        </li>
                    </ul>
                </div>
            </li>
            <li class="{{ $elementActive == 'Activos'|| $elementActive == 'sinCausa' || $elementActive == 'inactivos' ? 'active' : '' }}">
                <a data-toggle="collapse" aria-expanded="false" class="collapsed" href="#clientes">
                    <img class="icon" src="{{ asset('paper') }}/icons/Spot icon_mercado.svg" alt="">
                    <p>
                        {{ __('Clientes') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="clientes">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'Activos' ? 'active' : '' }}">
                            <a href="{{ route('Cliente.index') }}">
                                <p>{{ __('Cliente') }}</p>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'sinCausa' ? 'active' : '' }}">
                            <a href="{{ route('Cliente.listarInactivos') }}">
                                <span class="sidebar-normal">{{ __(' Inactivos sin causa') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'inactivos' ? 'active' : '' }}">
                            <a href="{{ route('Cliente.inactivos') }}">
                                <span class="sidebar-normal">{{ __('Clientes Inactivos') }}</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>


            <li class="{{ $elementActive == 'macros' || $elementActive == 'macrosB2C' || $elementActive == 'misMacrosIntercom' ? 'active' : '' }}">
                <a data-toggle="collapse" aria-expanded="false" class="collapsed" href="#intercom">
                    <img class="icon" src="{{ asset('paper') }}/icons/Spot icon_mensaje.svg" alt="">
                    <p>
                        {{ __('Macros Intercom') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="intercom">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'macros' ? 'active' : '' }}">
                            <a href="{{ route('MacrosIntercom.index') }}">
                                <p>{{ __('Macros Itercom B2B') }}</p>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'macrosB2C' ? 'active' : '' }}">
                            <a href="{{ route('MacrosIntercom.grupobtc') }}">
                                <p>{{ __('Macros Itercom B2C') }}</p>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'misMacrosIntercom' ? 'active' : '' }}">
                            <a href="{{ route('MacrosIntercom.misMacros') }}">
                                <span class="sidebar-normal">{{ __('Mis macros') }}</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>

            <li class="{{ $elementActive == 'macrosZendesk' || $elementActive == 'macrosZendeskbtc' || $elementActive == 'misMacrosZendesk' ? 'active' : '' }}">
                <a data-toggle="collapse" aria-expanded="false" class="collapsed" href="#zendesk">
                    <img class="icon" src="{{ asset('paper') }}/icons/Spot icon_registro.svg" alt="">
                    <p>
                        {{ __('Macros Zendesk') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="zendesk">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'macrosZendesk' ? 'active' : '' }}">
                            <a href="{{ route('MacrosZendesk.index') }}">
                                <p>{{ __('Macros Zendesk B2B') }}</p>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'macrosZendeskbtc' ? 'active' : '' }}">
                            <a href="{{ route('MacrosZendesk.grupobtc') }}">
                                <p>{{ __('Macros Zendesk B2C') }}</p>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'misMacrosZendesk' ? 'active' : '' }}">
                            <a href="{{ route('MacrosZendesk.misMacros') }}">

                                <span class="sidebar-normal">{{ __('Mis macros') }}</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>

            <li class="{{ $elementActive == 'asignados' || $elementActive == 'misAsignados' ? 'active' : '' }}">
                <a data-toggle="collapse" aria-expanded="false" class="collapsed" href="#asignacion">
                    <img class="icon" src="{{ asset('paper') }}/icons/Spot icon_panel de control.svg"
                        alt="">
                    <p>
                        {{ __('Asignación cliente') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="asignacion">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'asignados' ? 'active' : '' }}">
                            <a href="{{ route('Asignacion.index') }}">
                                <p>{{ __('Enterprise') }}</p>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'misAsignados' ? 'active' : '' }}">
                            <a href="{{ route('Asignacion.miAsignado') }}">
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
