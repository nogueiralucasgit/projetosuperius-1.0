  $(function(){
      var header = $('header');
      var janela = $(window);


      /* HEADER SLIDE DOWN*/

      $(window).scroll(function(){

          var posicao = $(window).scrollTop();
          console.log(posicao)

          if (posicao >= 500){
              header.slideDown(400);
          }
          else{
              header.slideUp();
          }
      });

      /*DROP DOWN*/

      $(document).ready(function() {
        $('.dropdown-btn').click(function() {
            var dropdown = $(this).siblings('.dropdown-content');
            $('.dropdown-content').not(dropdown).slideUp();
            dropdown.slideToggle();
                  
          });
          $(document).ready(function() {
              $("p").click(function() {
                $(this).css("border-bottom", "2px solid #ffffff" );
              }   );
            });
            
            
        });

        
    

        $(document).ready(function() {
          // manipula o evento de clique do botão "Sobre"
          $('#bSobre').click(function() {
            // rola a página para a altura determinada (200 pixels abaixo da parte superior da página)
            $('html, body').animate({
              scrollTop: $('body').offset().top + 1563.1999
            }, 1000); // ajuste a duração da animação (em milissegundos) conforme necessário
          });
        });

        /* FUNÇÕES DE CLICK */

        $(document).ready(function() {
          // manipula o evento de clique do botão "Sobre"
          $('#bComputadores').click(function() {
            // rola a página para a altura determinada (200 pixels abaixo da parte superior da página)
            $('html, body').animate({
              scrollTop: $('body').offset().top + 660
            }, 1000); // ajuste a duração da animação (em milissegundos) conforme necessário
          });
        });
        $(document).ready(function() {
          // manipula o evento de clique do botão "Sobre"
          $('#bContato').click(function() {
            // rola a página para a altura determinada (200 pixels abaixo da parte superior da página)
            $('html, body').animate({
              scrollTop: $('body').offset().top + 2144.4444
            }, 1000); // ajuste a duração da animação (em milissegundos) conforme necessário
          });
        });
        $(document).ready(function() {
          // manipula o evento de clique do botão "Sobre"
          $('#bHome').click(function() {
            // rola a página para a altura determinada (200 pixels abaixo da parte superior da página)
            $('html, body').animate({
              scrollTop: $('body').offset().top + 0
            }, 1000); // ajuste a duração da animação (em milissegundos) conforme necessário
          });
        });

      // abre um input para pesquisa
      
        $(document).ready(function() {

          $('#bSearch').click(function() { 
            $('.bSearch').slideToggle();;
          });
          });
          
        });

      
    
    
      
        

        
