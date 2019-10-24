<section class="hero u-mb_xl">
	@if(app('env') == 'local')
  <img src="{{ asset('/img/hero.jpg') }}" class="hero__banner c-img">
  @else
	<img src="{{ secure_asset('/img/hero.jpg') }}" class="hero__banner c-img">
	@endif
  <div class="hero__textbox p-herotext">
    <h1 class="c-title">仕事の受注をシンプルに！</h1>
    <p>「match!」は、案件の依頼や応募、プロジェクトへの参加を簡単に、気軽に行えるようにする「エンジニアのマッチングサイト」です。</p>
  </div>
</section>
