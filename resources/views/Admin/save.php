@extends('...layouts.admin')


@section('page-title')
<div class="row">
	<div class="col-12">
		<div class="page-title-box d-flex align-items-center justify-content-between">
			<h4 class="mb-0 font-size-18">TABLEAU DE BORD <span class="pull-right">INDICATEURS DE PERFORMANCE DE L'ANNEE <?= date('Y') ?></span></h4>

			<div class="page-title-right">
				<ol class="breadcrumb m-0">
					<li class="breadcrumb-item"><a href="javascript: void(0);">SITRAD MANAGEMENT</a></li>
					<li class="breadcrumb-item active">Tableau de bord</li>
				</ol>
			</div>

		</div>
	</div>
</div>
@endsection

@section('content')

<div>
	<h5 style="padding-bottom: 10px; border-bottom: 1px #cccccc">ACTIVITES DE BASE</h5>


	<h5 style="border-bottom: 1px solid #222; padding-bottom: 10px; margin-bottom: 20px">FINANCES</h5>

	<h5 style="border-bottom: 1px solid #222; padding-bottom: 10px; margin-bottom: 20px">TRESORERIE</h5>

</div>

@endsection