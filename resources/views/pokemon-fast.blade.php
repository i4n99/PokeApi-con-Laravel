@extends('layout')
@section('content')
    <div class="container">
        <div class="row">
            @forelse ($pokemonList as $index=>$pokemon)
                <div class="col-4 mb-4">
                    <div class="poke-list" data-poke-name>
                        <button data-poke-id="{{$index}}" class="poke-boton searchable" data-poke-name="{{ $pokemon->name }}">{{ ucwords($pokemon->name) }}</button>
                    </div>
                </div>
            @empty
                No hay datos de pokemon para mostrar
            @endforelse
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="poke-modal">
        <div class="modal-dialog modal-sm modal-dialog-centered" style="max-width: 500px;" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <strong class="poke-name"></strong>
                    </h5>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row justify-content-center align-items-center">

                            <div class="col-sm mb-4">
                                <div data-poke-card class="poke-card">
                                    <div data-poke-img-container class="img-container">
                                        <img data-poke-img class="poke-img" src="{{ asset('img/poke-shadow.png') }}"/>
                                    </div>
                                    <div class="poke-id">ID = </div>
                                    
                                    <div data-poke-types class="poke-types"></div>
                                    <div data-poke-stats class="poke-stats"></div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

      <script>
            
        $( document ).ready(function() {

            $('.poke-boton').on('click', function(){

                const url = "{{ route('pokeModal') }}";
                
                let data = {
                    "name": $(this).data("poke-name"),
                    "_token": '{{ csrf_token() }}',
                }
                $.ajax({
                        url: url,
                        data: data,
                        type : 'POST',
                        dataType : 'JSON',
                        success : function(data) {
                            // console.log(data);
                            $('.poke-img').attr('src', data.sprites.front_default);
                            $('.poke-name').html(data.upperCaseName);
                            $('.poke-id').html("ID = " + data.id);
                            let htmlTypes = "";
                            data.types.forEach(types => {
                                htmlTypes += "<div> " + 
                                             types.type.name +
                                             " </div>";
                            });

                            $('.poke-types').html(htmlTypes)
                            $('#poke-modal').modal('show');

                        },
                        error : function (error) {
                            console.log(error);

                            $('.sending-msg').css('display', 'none');
                            
                        }
                });
            });

            $('.poke-search').on('change', function(){
                if($('.poke-search').html() != null){
                    let searchTerm = $(this).val();
                    $('.searchable').hide();
                    // $('.poke-list').find('button').first().show();
                    $('.searchable:contains("'+searchTerm+'")').show();
                    // console.log(searchTerm);
                    
                }
                // Highlight search term inside a specific context
                // console.log($(".searchable").val())
                // $(".searchable").unmark().mark(searchTerm);
            });
        });
            
        </script>
@endsection
