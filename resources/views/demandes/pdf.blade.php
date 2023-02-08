<!DOCTYPE html>
<html lang="an">
<head>
    <title></title>
    <style>
        #absences {
            font-family: "Poppins", sans-serif, Arial, Helvetica;
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
        #repo{
            color: #755102;
            border: 1px solid #ffaf00;
            border-radius: 20px;
            background-color: #ffc107;
            padding: 0.375rem 0.5625rem;
        }
                #acce{
            color: #34B1AA;
            border-radius: 20px;
            padding: 0.375rem 0.5625rem;
            background-color: #B0FFC2;
            border: 1px solid #B0FFC2;
        }
            #reje{
            color: #F95F53;
            border: 1px solid #ffb1c1;
            border-radius: 20px;
            padding: 0.375rem 0.5625rem;
            background-color: #ffb1c1; 
            }
            #cour{
            border-radius: 20px;
            padding: 0.375rem 0.5625rem;
            background-color: #fdf3e8;
            color: #845d3d;
            border: 1px solid #fdf3e8;
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
<center style="font-weight: bolder; text-decoration: underline;">Liste des Demandes</center>
<br>
<table id="absences">
    <tr>
        <th>Nom & Prénoms</th>
        <th>Type de demande</th>
        <th>Date de depart</th>
		<th>Date de retour</th>
        <th>Message</th>
        <th>Statut</th>
    </tr>
    @foreach($demandes as $dmd)
        <tr>
            <td>{{ucfirst($dmd->user->name ?? '-')}} {{ucfirst($dmd->user->prenoms ?? '')}}</td>
            <td>{{ucfirst($dmd->motif->libelle ?? '-')}}</td>
            <td>{{ucfirst($dmd->date_depart ?? '_')}}</td>
            <td>{{ucfirst($dmd->date_retour ?? '_')}}</td>
            <td>{!!html_entity_decode($dmd->message)!!}</td>
            <td>
                @switch($dmd->statut)
                      @case("0")
                         <label class="badge badge-warning"  id="cour">En cours</label>
                        @break
                      @case("1")
                         <label class="badge badge-success"  id="acce">Accepter</label>
                         @break
                      @case("2")
                         <label class="badge badge-danger" id="reje">Rejeter</label>
                         @break
                      @default
                         <label class="badge badge-danger" id="repo">Reporté</label>
                      @endswitch
            </td>
            
        </tr>
    @endforeach
</table>
<script type="text/php">
        if (isset($pdf)) {
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
