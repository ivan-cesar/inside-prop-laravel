<!DOCTYPE html>
<html lang="an">
<head>
    <title></title>
    <style>
        #absences {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #absences td, #absences th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #absences tr:nth-child(even){background-color: #f2f2f2;}

        #absences tr:hover {background-color: #ddd;}

        #absences th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #e84323;
            color: white;
        }
        #absences td {
            font-size: 12px;
        }
    #cont{
            margin-bottom:90px;
            width:100%;
        }
        #image{
            width:30%;
            float:left;
        }
        #texte{
            width:70%;
            float:right;
        }
    </style>
</head>
<body>
    <center id="cont">
        <img src="{{('public/logo-propulse.png')}}" id="image" alt="logo_propulse" style="width: 244px; height: 45px;">
        <center id="texte">
            Marketing Digital | Développement Web | Technologies Financières | Communication Digitale
                                 Evènementiel | Immobilier | Agropastorale | Matériels Informatiques
        </center>
</center>
<br>

<center style="font-weight: bolder; text-decoration: underline;">Liste des Achats</center>
<br>
<table id="absences">
    <tr>
        <th>Nom & Prénoms</th>
        <th>Type d'achat</th>
        <th>Intitulé du projet</th>
		<th>Departement</th>
        <th>Description</th>
    </tr>
    @foreach($achats as $achat)
        <tr>
            <td>{{ucfirst($achat->user->name ?? '-')}} {{ucfirst($achat->user->prenoms ?? '')}}</td>
            <td>{{ucfirst($achat->motif->libelle ?? '-')}}</td>
            <td>{{ucfirst($achat->intitule_projet ?? '_')}}</td>
            <td>{{ucfirst($achat->user->departement->libelle ?? '_')}}</td>
            <td>{!!html_entity_decode($achat->description)!!}</td>
            
        </tr>
    @endforeach
</table>
<script type="text/php">
        if ( isset($pdf) ) {
            // OLD 
            // $font = Font_Metrics::get_font("helvetica", "bold");
            // $pdf->page_text(72, 18, "{PAGE_NUM} of {PAGE_COUNT}", $font, 6, array(255,0,0));
            // v.0.7.0 and greater
            $x = 380;
            $y = 550;
            $text = "{PAGE_NUM} / {PAGE_COUNT}";
            $font = $fontMetrics->get_font("helvetica", "bold");
            $size = 18;
            $color = array(255,0,0);
            $word_space = 0.0;  //  default
            $char_space = 0.0;  //  default
            $angle = 0.0;   //  default
            $pdf->page_text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
        }
    </script>
</body>
</html>
