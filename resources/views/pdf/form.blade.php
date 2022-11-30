<style>
	h1 {
		font-size: 24px;
		margin: 0 0 0 0;
		font-family: 'Helvetica';
	}

	h2 {
		font-size: 20px;
		margin: 30px 0 12px 0;
		font-family: 'Helvetica';
	}

	h3 {
		font-size: 16px;
		margin: 0 0 12px 0;
		color: #555;
		font-family: 'Helvetica';
	}

	table {
		width: 100%;
	}

	.cell {
		padding: 7px 5px;
		border: #555 solid 1px;
		font-size: 12px;
		font-family: 'Helvetica';
	}

	.left {
		text-align: left;
	}

	.right {
		text-align: right;
	}

	.center {
		text-align: center;
	}

	.small {
		font-size: 10px;
	}

	.page-break {
		page-break-after: always;
	}
</style>

<table class="">
	<tbody>
		<tr>
			<td class="left">
				<h1>Texas Baptist Encampment</h1>
				<h3>HEALTH CARD / {{ strtoupper($reg->type) }} REGISTRATION FORM</h3>
			</td>
			<td width="125">
				<img src="{{ asset('images/logo_red.png') }}" height="70">
			</td>
		</tr>
	</tbody>
</table>

<h2 align="center">{{ strtoupper($reg->type) }} INFORMATION</h2>

<table>
	<tbody>
		<tr>
			<td width="33%" class="cell left">FIRST NAME: <strong>{{ $reg->fname }}</strong></td>
			<td width="33%" class="cell left">LAST NAME: <strong>{{ $reg->lname }}</strong></td>
			<td width="34%" class="cell left">CHURCH: <strong>{{ $reg->group->group }}</strong></td>
		</tr>
		<tr>
			@php
			$address = $reg->street.', '.$reg->city.', '.$reg->state.' '.$reg->zip;
			@endphp
			<td colspan="3" class="cell left">ADDRESS: <strong>{{ $address }}</strong></td>
		</tr>
		<tr>
			<td class="cell left">AGE: <strong>{{ $reg->age }}</strong></td>
			<td class="cell left">DOB: <strong>{{ date('m-d-Y', $reg->birthday) }}</strong></td>
			<td class="cell left">SHIRT SIZE: <strong>{{ $reg->shirt }}</strong></td>
		</tr>
	</tbody>
</table>

@if($reg->type == 'camper')
<h2 align="center">PARENT/GAURDIAN INFORMATION</h2>

<table>
	<tbody>
		<tr>
			<td width="33%" class="cell left">FIRST NAME: <strong>{{ $reg->parent_fname }}</strong></td>
			<td width="33%" class="cell left">LAST NAME: <strong>{{ $reg->parent_lname }}</strong></td>
			<td width="34%" class="cell left">RELATIONSHIP: <strong>{{ $reg->parent_rel }}</strong></td>
		</tr>
		<tr>
			<td colspan="3" class="cell left">ADDRESS: <strong>{{ $address }}</strong></td>
		</tr>
		<tr>
			<td class="cell left">CELL: <strong>{{ $reg->parent_cell }}</strong></td>
			<td class="cell left">HOME: <strong>{{ $reg->parent_home }}</strong></td>
			<td class="cell left">WORK: <strong>{{ $reg->parent_work }}</strong></td>
		</tr>
	</tbody>
</table>
@endif

<h2 align="center">MEDICAL HISTORY</h2>

<table>
	<tbody>
		<tr>
			<td colspan="6" class="cell left">
				<p class="small"><strong>* VERY IMPORTANT!</strong> - Texas state law requires that certain information be disclosed. Your cooperation as leaders and parents will aid in that. This form <strong>must have allergy and current immunization</strong> information listed with exact dates for anyone under 18. This may be an inconvenience but state law <strong><u>requires guests to be sent home immediately</u></strong> that do not give complete information.</p>
			</td>
		</tr>
		<tr>
			<td width="40%" class="cell left">
				ALL CONDITIONS THAT THIS {{ strtoupper($reg->type) }} CURRENTLY HAS OR HAS HAD IN THE PAST:
			</td>
			<td width="60%" class="cell left">
				<strong>{{ implode(', ', array_filter(json_decode($reg->conditions, true))) }}</strong>
			</td>
		</tr>
		<tr>
			<td class="cell left">
				EXPLANATION FOR ABOVE LISTED CONDITIONS:
			</td>
			<td class="cell left">
				<strong>{{ $reg->condition_details }}</strong>
			</td>
		</tr>
		<tr>
			<td class="cell left">
				ALLERGIES:
			</td>
			<td class="cell left">
				<strong>{{ $reg->allergies }}</strong>
			</td>
		</tr>
	</tbody>
</table>

@if($reg->type == 'camper')
<h2 align="center">IMMUNIZATION RECORDS</h2>

<table>
	<tbody>
		@if($reg->imm_optout)
		<tr>
			<td width="50%" class="cell left">
				I HAVE CHOSEN TO NOT HAVE MY CHILD IMMUNIZED:</td>
			</td>
			<td width="50%" class="cell center"><strong>{{ $reg->esign }}</strong></td>
		</tr>
		@else
		<tr>
			<td width="17%" class="cell left">IMMUNIZATIONS:</td>
			<td width="17%" class="cell center">DPT/DT</td>
			<td width="16%" class="cell center">POLIO</td>
			<td width="16%" class="cell center">MMR</td>
			<td width="17%" class="cell center">TB</td>
			<td width="17%" class="cell center">OTHER:</td>
		</tr>
		<tr>
			<td class="cell left">EXACT DATE:</td>
			<td class="cell center">
				<strong>
					@if($reg->imm_optout) &nbsp; @else {{ date('m-d-Y', $reg->imm_dptdt) }} @endif
				</strong>
			</td>
			<td class="cell center">
				<strong>
					@if($reg->imm_optout) &nbsp; @else {{ date('m-d-Y', $reg->imm_polio) }} @endif
				</strong>
			</td>
			<td class="cell center">
				<strong>
					@if($reg->imm_optout) &nbsp; @else {{ date('m-d-Y', $reg->imm_mmr) }} @endif
				</strong>
			</td>
			<td class="cell center">
				<strong>
					@if($reg->imm_optout) &nbsp; @else {{ date('m-d-Y', $reg->imm_tb) }} @endif
				</strong>
			</td>
			<td class="cell center"><strong></strong></td>
		</tr>
		@endif
	</tbody>
</table>
@endif

<h2 align="center">MEDICATIONS</h2>

<table>
	<tbody>
		<tr>
			<td width="100%" class="cell left"><strong>{{ $reg->medications }}</strong></td>
		</tr>
		<tr>
			<td class="cell left">
				<p class="small">** Texas law <u>requires</u> that all prescription medications (meds) for children & youth be stored & dispensed only by the Camp Health Officer (CHO). For a further step of safety, TBE <u>recommends</u> that all youth & adult meds, prescription & non-prescription, be stored & dispensed only by the CHO. This recommendation will be at the discretion of the group leader and the CHO. Prescription meds shall be sent in the original container with prescription label and gathered in a clear ziploc-type bag with camper name & church clearly marked. Upon camper arrival, the CHO shall place meds and related paraphernalia in a lockable storage area not accessible to campers. Meds shall be administered only by the CHO, unless otherwise allowed. At no time shall a child or youth be allowed to carry or self-administer meds without adult supervision, except in the case of immediate-use meds needed for life-threatening conditions (i.e. bee-sting meds, inhaler, etc…) and limited medications approved for use in first-aid kits. In each of these cases, the camp shall have on file a written statement of medical necessity from the prescribing doctor or the written approval of the Camp Health Officer for any camper to carry medication and related paraphernalia or devices.</p>
			</td>
		</tr>
	</tbody>
</table>

@if($reg->type == 'camper')
<div class="page-break"></div>
@endif

<h2 align="center">EMERGENCY AUTHORIZATION</h2>

<table>
	<tbody>
		<tr>
			<td colspan="2" class="cell left">INSURANCE CO:<br><strong>{{ $reg->ins_company }}</strong></td>
			<td width="25%" class="cell left">INSURED NAME:<br><strong>{{ $reg->ins_name }}</strong></td>
			<td width="25%" class="cell left">POLICY #:<br><strong>{{ $reg->ins_policy }}</strong></td>
		</tr>
		<tr>
			<td colspan="2" class="cell left">EMERGENCY CONTACT:<br><strong>{{ $reg->ice_fname . ' ' . $reg->ice_lname }}</strong></td>
			<td class="cell left">DOCTOR:<br><strong>{{ $reg->doctor }}</strong></td>
			<td class="cell left">OFFICE #:<br><strong>{{ $reg->doc_phone }}</strong></td>
		</tr>
		<tr>
			<td width="25%" class="cell left">DAY PHONE:<br><strong>{{ $reg->ice_phone }}</strong></td>
			<td width="25%" class="cell left">EVE PHONE:<br><strong>{{ $reg->ice_phone }}</strong></td>
			<td class="cell left">DENTIST:<br><strong>{{ $reg->dentist }}</strong></td>
			<td class="cell left">OFFICE #:<br><strong>{{ $reg->dent_phone }}</strong></td>
		</tr>
		<tr>
			<td colspan="4" class="cell left small">
				<p>I understand that any youth or adult with a high fever will be sent home. I hereby authorize the camp health officer to administer medication to this child. If a medical emergency should arise while the above youth or adult is in attendance at TBE, I hereby authorize the camp health officer or camp director to provide care and/or transport them to a medical facility. I further authorize the medical facility to administer necessary care upon arrival. I do understand that camper insurance at TBE is secondary to personal insurance which should be used for any claims occurring at TBE. I acknowledge that I am signing by means of an electronically-produced signature, that shall have the same legal effect as if, such signature had been manually written and shall be deemed to have been signed by myself for the purposes of any statute or rule of law that requires. I acknowledge that, in any legal proceedings between myself and TBE in any way relating to this computer-based registration form, each party expressly waives any right to raise any defence or waiver of liability based upon the execution of this authorization by a party by means of an electronically- produced signature.</p>
			</td>
		</tr>
		<tr>
			<td colspan="2" class="cell left">SIGNATURE:<br><strong>{{ $reg->esign }}</strong></td>
			<td class="cell left">PRINTED NAME:<br><strong>{{ $reg->esign }}</strong></td>
			<td class="cell left">DATE/TIME:<br><strong>{{ $reg->created_at }}</strong></td>
		</tr>
	</tbody>
</table>