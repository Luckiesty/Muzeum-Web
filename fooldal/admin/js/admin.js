$('.fris').on('click' ,function(e)
        {
            e.preventDefault();
            Swal.fire({
                title: 'Biztos menteni akarod?', 
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'mentés',
                }).then((result) => { 
                    if (result.value) 
                    {
                        var $form = $( '#szek' ),
                        nev = $form.find( "#nev" ).val(),
                        email = $form.find( "#email" ).val(),
                        statusz = $form.find( "#statusz" ).val(),
                        url = $form.attr( "action" );
                        console.log(url);
                        // Send the data using post
                        var posting = $.post( url, { nevfris: nev, emailfris: email, statuszfris: statusz } );

                        posting.done(function( data ) {
                            $("#tablazat").html(data);
                        });
                    }
                })
            });

        $('#kereses').keyup(function(e)
        {
            e.preventDefault();
          
                   
                        var $form = $( '#keres' ),
                        nev = $form.find( "#kereses" ).val(),
                        url = $form.attr( "action" );
                        console.log(url);
                        // Send the data using post
                        var posting = $.post( url, { nev: nev } );

                        posting.done(function( data ) {
                            $("#tablazat").html(data);
                        });
                    
                    });


            $('.torles').on('click' ,function(a)
        {
            
            a.preventDefault();
            Swal.fire({
                title: 'Biztos törlöni akarod?', 
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'törlés',
                }).then((result) => { 
                    if (result.value) 
                    {
                        window.location  = "torles.php"
                    }
                })
            })
                