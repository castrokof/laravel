<!DOCTYPE html>
<html style="height: auto;" lang="en">
<head>
  <title>Img Manteliviano</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset("assets/$theme/plugins/fontawesome-free/css/all.min.css")}}">
  
   <!-- Theme style -->
  <link rel="stylesheet" href="{{asset("assets/$theme/dist/css/adminlte.min.css")}}">
  
  <!-- Theme Toastr -->
  <link rel="stylesheet" href="{{asset("assets/$theme/plugins/toastr/toastr.min.css")}}">  
  
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.3/dist/leaflet.css">
    
<!-- Theme Custom -->
<!--<link rel="stylesheet" href="{{asset("assets/css/magnify-white-theme.css")}}">-->
<!--<link rel="stylesheet" href="{{asset("assets/css/magnify-bezelless-theme.css")}}">-->
<link rel="stylesheet" href="{{asset("assets/css/jquery.magnify.css")}}">
<link rel="stylesheet" href="{{asset("assets/css/jquery.magnify.min.css")}}">
<link rel="stylesheet" href="{{asset("assets/css/custom.css")}}">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<!--<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">-->
<!-- stile bellow -->
<style>
    .magnify-modal {
      box-shadow: 0 0 6px 2px rgba(0, 0, 0, 0.3);
    }

    .magnify-header .magnify-toolbar {
      background-color: rgba(0, 0, 0, .5);
    }

    .magnify-stage {
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      border-width: 0;
    }

    .magnify-footer .magnify-toolbar {
      background-color: rgba(0, 0, 0, .5);
      border-top-left-radius: 5px;
      border-top-right-radius: 5px;
    }

    .magnify-header,
    .magnify-footer {
      pointer-events: none;
    }

    .magnify-button {
      pointer-events: auto;
    }
  </style>


  
</head>
<body>
<div class="container-fluid">
<div class="col-12">
<div class="card">
              <div class="card-header bg-lightblue disabled color-palette">
                <div class="card-title">
                 @foreach($datas as $poli)
                 <h4 class="text-center">DETALLE DE POLIZA {{($poli->poliza)}} </h4>
                 @endforeach
                </div>
             </div>
              <div class="card-body">
    
<div class="row">

<div class="col-md-5">

<div class="card card-info">
        <div class="card-header">
                <div class="card-title">
                 FOTOS ANTES DE MTL
                </div>
             </div>
              <div class="card-body">
            
              @foreach($datas as $img)
                @if(!empty($img->foto1) || !empty($img->foto2) || !empty($img->foto3) || !empty($img->foto4) || !empty($img->foto5))
                 
                  
                <div class="row">
                  <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a data-magnify="gallery" href="{{asset('/tmp/'.$img->foto1)}}">
                      <img src="{{asset('/tmp/'.$img->foto1)}}?auto=compress&cs=tinysrgb&dpr=2&h=650&w=480" alt="" class="zoom img-fluid" alt="" width="" height="">
                    </a>
                     
                  </div>
                  <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a data-magnify="gallery" href="{{asset('/tmp/'.$img->foto2)}}" >
                      <img src="{{asset('/tmp/'.$img->foto2)}}?auto=compress&cs=tinysrgb&dpr=2&h=650&w=480" alt="" class="zoom img-fluid" alt="" width="" height="">
                      </a>
                      
                  </div>
                  <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a data-magnify="gallery" href="{{asset('/tmp/'.$img->foto3)}}" >  
                    <img src="{{asset('/tmp/'.$img->foto3)}}?auto=compress&cs=tinysrgb&dpr=2&h=650&w=480" alt="" class="zoom img-fluid" alt="" width="" height="">
                    </a>
                  </div>
                  @if(!empty($img->foto4))
                  <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                     <a data-magnify="gallery" href="{{asset('/tmp/'.$img->foto4)}}" >  
                    <img src="{{asset('/tmp/'.$img->foto4)}}?auto=compress&cs=tinysrgb&dpr=2&h=650&w=480" alt="" class="zoom img-fluid" alt="" width="" height="">     
                     </a>
                  </div>
                  @endif
                  
                  @if(!empty($img->foto5))
                  <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a data-magnify="gallery" href="{{asset('/tmp/'.$img->foto5)}}" >
                    <img src="{{asset('/tmp/'.$img->foto5)}}?auto=compress&cs=tinysrgb&dpr=2&h=650&w=480" alt="" class="zoom img-fluid" alt="" width="" height="">  
                    </a>
                  
                  </div>
                  @endif
                </div>
            </div>
        </div>

<div class="col-md-12">

<div class="card card-info">
              <div class="card-header">
                <div class="card-title">
                 FOTOS DESPUES DE MTL
                </div>
             </div>
 <div class="card-body">                
                
                <div class="row">
                  <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                @if(!empty($img->foto6))      
                    <a data-magnify="gallery" href="{{asset('/tmp/'.$img->foto6)}}" >
                      <img src="{{asset('/tmp/'.$img->foto6)}}?auto=compress&cs=tinysrgb&dpr=2&h=650&w=480" alt="" class="zoom img-fluid" alt="" width="" height="">
                    </a>
                @endif      
                  </div>
                
                  
                
                  <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                @if(!empty($img->foto7))        
                    <a data-magnify="gallery" href="{{asset('/tmp/'.$img->foto7)}}" >
                      <img src="{{asset('/tmp/'.$img->foto7)}}?auto=compress&cs=tinysrgb&dpr=2&h=650&w=480" alt="" class="zoom img-fluid" alt="" width="" height="">
                     
                    </a>
                @endif    
                  </div>
                
                  
                
                   <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                @if(!empty($img->foto8))         
                    <a data-magnify="gallery" href="{{asset('/tmp/'.$img->foto8)}}" >
                      <img src="{{asset('/tmp/'.$img->foto8)}}?auto=compress&cs=tinysrgb&dpr=2&h=650&w=480" alt="" class="zoom img-fluid" alt="" width="" height="">
                     
                    </a>
                @endif      
                  </div>
                
            </div>
         </div>
         </div>
    </div>
        

       
</div>
    
<div class="col-md-7">
 
<div class="card card-info">
              <div class="card-header">
                <div class="card-title">
                 DATOS BASICOS 
                </div>
             </div>
 <div class="card-body">                
                
        <div class="row">
            
           <div class="col-lg-5 col-md-5 col-xs-5 thumb"> 
                    <p class="lead-center"><h5>POLIZA: {{($img->poliza)}}</h5></p>
                   <div class="table-responsive">
                    <table class="table table-striped table-hover">
                      <tbody>
                      <tr>
                        <th style="width:20%">Nombre:</th>
                        <td>{{($img->nombre)}}</td>
                      </tr>
                      <tr>
                        <th>Direccion:</th>
                        <td>{{($img->direccion)}}</td>
                      </tr>
                      <tr>
                        <th>Recorrido:</th>
                        <td>{{($img->recorrido)}}</td>
                      </tr>
                      <tr>
                        <th>Medidor:</th>
                        <td>{{($img->medidor)}}</td>
                      </tr>
                      <tr>
                        <th>Zona:</th>
                        <td>{{($img->zona)}}</td>
                      </tr>
                      <tr>
                        <th>Funcionario:</th>
                        <td>{{($img->nombreu)."-".($img->usuario)}}</td>
                      </tr>
                      <tr>
                        <th>Fecha ejecución:</th>
                        <td>{{($img->fecha_de_ejecucion)}}</td>
                      </tr>
                      </tbody></table>
                  </div>
                </div>
            <div class="col-lg-3 col-md-3 col-xs-3 thumb">
                <p class="lead-center"><h5>DATOS EN TERRENO</h5></p>

                  <div class="table-responsive">
                    <table class="table table-striped table-hover">
                      <tbody>
                    
                        <th style="width:50%">Sin caja:</th>
                        <td>{{($img->sin_caja)}}</td>
                      </tr>
                      <tr>
                        <th>Sin tapa:</th>
                        <td>{{($img->sin_tapa)}}</td>
                      </tr>
                      <tr>
                        <th>Fuga antes:</th>
                        <td>{{($img->fuga_antes)}}</td>
                      </tr>
                       <tr>
                        <th>Fuga despues:</th>
                        <td>{{($img->fuga_despues)}}</td>
                      </tr>
                      <tr>
                        <th>Talco roto:</th>
                        <td>{{($img->talco_roto)}}</td>
                      </tr>
                      <tr>
                        <th>Posible fraude:</th>
                        <td>{{($img->posible_fraude)}}</td>
                      </tr>
                      <tr>
                      </tbody></table> 
                   
                  </div>
                </div>    
                
              <div class="col-lg-4 col-md-4 col-xs-4 thumb">
                   <p class="lead-center"><h5>DATOS MTL</h5></p>
                   <div class="table-responsive">
                    <table class="table table-striped table-hover">
                      <tbody>
                      <tr>
                        <th style="width:50%">Lectura:</th>
                        <td>{{($img->lectura)}}</td>
                      </tr>
                      <tr>
                        <th>Nuevo medidor:</th>
                        <td>{{($img->new_medidor)}}</td>
                      </tr>
                      <tr>
                        <th>Marca:</th>
                        <td>{{($img->futuro2)}}</td>
                      </tr>
                      <tr>  
                      <tr>
                      <th>Oposición:</th>
                        <td>{{($img->oposicion)}}</td>
                      </tr>
                      <tr>
                        <th style="width:40%">Nombre opone:</th>
                        <td>{{($img->futuro)}}</td>
                      </tr>
                      <tr>
                        <th>Tipo de mtl:</th>
                        <td>{{($img->mtl)}}</td>
                      </tr>
                      <tr>
                        <th>Observación:</th>
                        <td>{{($img->futuro1)}}</td>
                      </tr>
                      <tr>
                    </tbody></table> 
                  
                  </div>
                </div>     
             </div>
           
</div> 
               
                
        
   
                    
                
        </div>
    
<div class="col-md-12">
 
<div class="card card-info">
              <div class="card-header">
                <div class="card-title">
                 POSICIONAMIENTO GPS
                </div>
             </div>
 <div class="card-body">                
                
                
            <div class="col-lg-12 col-md-12 col-xs-12 thumb">  
                
                  
                <div id="map" class="map map-home" style="margin:12px 0 12px 0;height:180px; width=600px;"></div> 
                
</div>
  
        
   
                
                      
                
        </div>
    </div>
</div>    
    
        
    </div>
</div>
 
<div class="container-fluid">
<div class="col-12">
<div class="row">
<div class="col-md-6">


</div>
         




    </div>
</div> 
       
        
       </div>
    </div>
</div>

            </div>
        </div>


 <script src="https://unpkg.com/leaflet@1.0.3/dist/leaflet.js"></script>	
<script>
       
        var osmUrl = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
	    osmAttrib = '&copy; <a href="http://openstreetmap.org/copyright">OpenStreetMap</a> contributors',
                		osm = L.tileLayer(osmUrl, {maxZoom: 18, attribution: osmAttrib});
                	var map = L.map('map').setView([{{$img->latitud}}, {{$img->longitud}}], 17).addLayer(osm);
                    L.marker([{{$img->latitud}}, {{$img->longitud}}])
                		.addTo(map)
                		.bindPopup('Poliza: {{$img->poliza}} Tipo MTL: {{$img->mtl}} <br> Nombre: {{$img->nombre}}<br> Direccion: {{$img->direccion}}')
                		.openPopup();
</script>
                  
@endif    
@endforeach   

<!-- jQuery -->
<script src="{{asset("assets/$theme/plugins/jquery/jquery.min.js")}}"></script>

<!-- jQuery UI -->
<script src="{{asset("assets/$theme/plugins/jquery-ui/jquery-ui.min.js")}}"></script>

<!-- Bootstrap 4 -->
<script src="{{asset("assets/$theme/plugins/bootstrap/js/bootstrap.bundle.min.js")}}"></script>

<!-- AdminLTE App -->
<script src="{{asset("assets/$theme/dist/js/adminlte.min.js")}}"></script>

<!-- AdminLTE for demo purposes -->
<script src="{{asset("assets/$theme/dist/js/demo.js")}}"></script>


<!--<script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>-->

<!-- Magnify -->

<script src="{{asset("assets/js/jquery.magnify.js")}}"></script>
<script src="{{asset("assets/js/jquery.magnify.min.js")}}"></script>
  
<script>
//standar
/*$('[data-magnify]').magnify({
      fixedContent: false
    });*/

//bellow
 $('[data-magnify]').magnify({
      headToolbar: [
        'close'
      ],
      footToolbar: [
        'zoomIn',
        'zoomOut',
        'prev',
        'fullscreen',
        'next',
        'actualSize',
        'rotateRight'
      ],
      title: false
    });
  
  
  
</script>




</body>
</html>