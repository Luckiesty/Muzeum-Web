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

        $('.jegyfris').on('click' ,function(e)
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
                        var $form = $( '#jegyszek' ),
                        nev = $form.find( "#nev" ).val(),
                        tipus = $form.find( "#tipus" ).val(),
                        ar = $form.find( "#ar" ).val(),
                        url = $form.attr( "action" );
                        console.log(url);
                        // Send the data using post
                        var posting = $.post( url, { jnevfris: nev, tipusfris: tipus, frisar: ar } );

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
            const href= $(this).attr('href');
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
                        document.location.href = href;
                    }
                })
            })
            $('.jegytorles').on('click' ,function(a)
            {
                const href= $(this).attr('href');
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
                            document.location.href = href;
                        }
                    })
                })
    

                $('.event').on('click' ,function(e)
                {
                    e.preventDefault();
                   
                                var $form = $( '#event' ),
                                nev = $form.find( "#nev" ).val(),
                                url = $form.attr( "action" );
                                console.log(nev);
                                // Send the data using post
                                var posting = $.post( url, {nev:nev } );
        
                                posting.done(function( data ) {
                                    $("#").html(data);
                                   
                                });
                            }
                        )
                  ;