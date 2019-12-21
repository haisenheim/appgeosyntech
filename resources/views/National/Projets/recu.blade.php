<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="UTF-8">
	<title>{{ $title }}</title>
</head>
<body>
    <h2>{{ $heading }} <small style="float: right;">{{ date_format($paiement->created_at,'d/m/Y H:i') }}</small></h2>
    <div>
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th>CLIENT :</th> <th>{{ $paiement->owner->name }}</th> </tr>
                   <tr> <th>PROJET :</th> <th>{{ $paiement->projet->name }}</th> </tr>
                   <tr> <th>ETAPE :</th> <th>{{ $paiement->step }}</th> </tr>
                   <tr> <th>MONTANT DU PAIEMENT :</th> <th>{{ number_format($paiement->montant,0,',','.') }} <sup>{{ $paiement->projet->devise->abb }}</sup></th>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>