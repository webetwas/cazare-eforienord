<?php
//var_dump($company);
// var_dump($rezervare);
// var_dump($camera);
?>
<style>
	table {
		font-family: arial, sans-serif;
		border-collapse: collapse;
		width: 100%;
		padding: 60px;
	}

	td, th {
		border: 1px solid #dddddd;
		text-align: left;
		padding: 10px;
	}
	h4{
		text-align: center;
	}	
</style>

<div>
	<h4>Rezervare San Pantaleo Rooms | Eforie Nord<br> 
		Nr.<?=$rezervare->id_rezervare ?>;
		Data:
		<?=date_format(date_create($rezervare->updated_at), 'd.m.Y');?>
	</h4>
	<table>
		<tr>
			<td>
				<p><strong>Firma: <?=$app->owner?></strong></p>
				<p>Nr.ord.reg.com/an: <?=$company->nrinreg;?></p>
				<p>C.I.F.: <?=$company->cui;?></p>
				<p>Sediul: <?=$company->adresa_ss?> <?=$company->adresa_ssloc?> <?=$company->adresa_ssjud?></p>
				<p>Banca <?=$company->banca_banca;?></p>
				<p>Cont: <?=$company->banca_iban;?></p>
				<p>Tel/Fax: <?=$company->telefon_fix;?></p>
				<p>Email: <?=$company->pc_email;?></p>
				<p>Web: <?=$app->website;?></p>

			</td>	
			<td valign="top">
				<p><strong>Cumparator: <?=$client->nume?> <?=$rezervare->numeprenume?></strong></p>			
				<p>Tel/Fax: <?=$rezervare->telefon?></p>
				<p>Email: <?=$rezervare->email?></p>
			</td>  
		</tr>  
	</table>
	<table>
		<tr>
			<th>Tip camera</th>
			<th>Nr adulti</th>
			<th>Nr copii</th>
			<th>Check-in</th>
			<th>Check-out</th>
		</tr>
		<tbody>
			<tr>
				<td><?=$camera->item_name?></td>
				<td><?=$rezervare->adulti ?></td>
				<td><?=$rezervare->copii ?></td>
				<td><?=date_format(date_create($rezervare->d_start), 'd.m.Y');?></td>
				<td><?=date_format(date_create($rezervare->d_end), 'd.m.Y');?></td>
			</tr>
		</tbody>
		<thead>
			<tr><tr>
			<tr><tr>
			<tr><tr>
			<tr>
				<th colspan="3"></th>
				<th>Total</th>
				<th><?=$rezervare->total?> Lei</th>
			</tr>
		</thead>
	</table>
</div>