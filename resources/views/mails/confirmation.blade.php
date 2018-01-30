hola {{$name}}, 
<p> Tu registro ha sido completado, por favor sigue el enlace para accesar a la plataforma.</p>

{{ route('confirmation',$token) }}