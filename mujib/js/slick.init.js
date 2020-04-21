// Fire Slick Plugin Slider For Partners
$('.partners__slider').slick({
  centerMode: true,
  centerPadding: '30px',
  slidesToShow: 5,
  autoplay: true,
  autoplaySpeed: 3000,
  responsive: [
      {breakpoint: 768,settings: {slidesToShow: 3}},
      {breakpoint: 480,settings: {slidesToShow: 2}}
  ]
});

// Fire Slick Plugin Slider For Clients
$('.clients__slider').slick({
  centerPadding: '100px',
  slidesToShow: 4,
  autoplay: true,
  autoplaySpeed: 4000,
  responsive: [
      {breakpoint: 768,settings: {slidesToShow: 2}},
      {breakpoint: 480,settings: {slidesToShow: 2}}
  ]
});