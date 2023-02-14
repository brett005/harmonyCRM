        <!-- JQUERY JS -->
        <script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>

        <!-- BOOTSTRAP JS -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

        <!-- MOMENT JS -->
        <script src="{{asset('assets/plugins/moment/moment.js')}}"></script>

        <!-- CIRCLE-PROGRESS JS -->
        <script src="{{asset('assets/plugins/circle-progress/circle-progress.min.js')}}"></script>

        <!-- SIDE-MENU JS -->
        <script src="{{asset('assets/plugins/sidemenu/sidemenu.js')}}"></script>

        <!-- PERFECT SCROLLBAR JS-->
        <script src="{{asset('assets/plugins/p-scrollbar/p-scrollbar.js')}}"></script>
        <script src="{{asset('assets/plugins/p-scrollbar/p-scroll1.js')}}"></script>

        <!-- SIDERBAR JS -->
        <script src="{{asset('assets/plugins/sidebar/sidebar.js')}}"></script>

        <!-- SELECT2 JS -->
		<script src=" {{asset('assets/plugins/select2/select2.full.min.js')}}"></script>

		<!-- STICKY JS -->
		<script src="{{asset('assets/js/sticky.js')}}"></script>
        <script src="{{asset('assets/js/themeColors.js')}}"></script>
        <script src="{{asset('assets/plugins/fullcalendar/fullcalendar.min.js')}}"></script>
        <script src="{{asset('assets/js/app-calendar.js')}}"></script>
        <script src="{{asset('js/jquery.flipTimer.js')}}"></script>
        <script src="{{asset('assets/plugins/model-datepicker/js/datepicker.js')}}"></script>
        <script src="{{asset('assets/plugins/model-datepicker/js/main.js')}}"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script>
            $('a#updateCampagne').one('click', function (e){
                e.preventDefault();

                swal({
                    text: 'Search for a movie. e.g. "La La Land".',
                    content: "input",
                    button: {
                        text: "Search!",
                        closeModal: false,
                    },
                })
                    .then(name => {
                        if (!name) throw null;

                        return fetch(`https://itunes.apple.com/search?term=${name}&entity=movie`);
                    })
                    .then(results => {
                        return results.json();
                    })
                    .then(json => {
                        const movie = json.results[0];

                        if (!movie) {
                            return swal("No movie was found!");
                        }

                        const name = movie.trackName;
                        const imageURL = movie.artworkUrl100;

                        swal({
                            title: "Top result:",
                            text: name,
                            icon: imageURL,
                        });
                    })
                    .catch(err => {
                        if (err) {
                            swal("Oh noes!", "The AJAX request failed!", "error");
                        } else {
                            swal.stopLoading();
                            swal.close();
                        }
                    });
            });
        </script>
