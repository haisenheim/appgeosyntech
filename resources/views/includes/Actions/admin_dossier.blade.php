<main>
    <nav class="floating-menu">
        <ul class="main-menu">
            @if($projet->bilans)
                <?php $link='dossier' ?>
            @else
                 <?php $link='projet' ?>
            @endif

            @if(\Illuminate\Support\Facades\Auth::user()->role_id==8)
                @if($projet->etape==1 && $projet->validated_step==0 && $projet->modepaiement_id>0)
                       <li>
                            <a  title="Valider le premier paiement" class="ripple" href="/national/{{ $link }}/validate-diag-interne/{{ $projet->token }}"><i class="fa fa-coins"></i></a>
                       </li>
                @endif
                @if($projet->etape==2 && $projet->validated_step<2 )
                       <li>
                            <a  title="Valider le deuxieme paiement" class="ripple" href="/national/{{ $link }}/validate-diag-externe/{{ $projet->token }}"><i class="fa fa-coins"></i></a>
                       </li>
                @endif
                @if($projet->etape==3 && $projet->validated_step<3 )
                       <li>
                            <a  title="Valider le troisieme paiement" class="ripple" href="/national/{{ $link }}/validate-plan-strategique/{{ $projet->token }}"><i class="fa fa-coins"></i></a>
                       </li>
                @endif
                @if($projet->etape==4 && $projet->validated_step<4 )
                       <li>
                            <a  title="Valider le quatrieme paiement" class="ripple" href="/national/{{ $link }}/validate-plan-financier/{{ $projet->token }}"><i class="fa fa-coins"></i></a>
                       </li>
                @endif
                 @if($projet->etape==4 && $projet->validated_step>=4 )
                    @if($projet->ordrevirement_validated)
                       <li>
                            <a  title="Rejeter l'ordre de virement" class="ripple" href="/national/{{ $link }}/disvalidate-ordre-virement/{{ $projet->token }}"><i class="fa fa-trash"></i></a>
                       </li>
                     @else
                       <li>
                            <a  title="Valider l'ordre de virement" class="ripple" href="/national/{{ $link }}/validate-ordre-virement/{{ $projet->token }}"><i class="fa fa-check"></i></a>
                       </li>
                     @endif
                @endif
                @if($projet->active )
                       <li>
                            <a  title="Bloquer le dossier" class="ripple" href="/national/{{ $link }}/disable/{{ $projet->token }}"><i class="fa fa-lock"></i></a>
                       </li>
                 @else
                        <li>
                            <a  title="debloquer le dossier" class="ripple" href="/national/{{ $link }}/enable/{{ $projet->token }}"><i class="fa fa-unlock"></i></a>
                       </li>
                @endif
           @endif
        </ul>
        <div class="menu-bg"></div>
    </nav>
</main>