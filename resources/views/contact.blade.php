@extends('layout.front')

@section('content')
<div class="contact">
    <h1 class="title">Контакты</h1>
    <div class="tile is-ancestor">
      <div class="tile is-vertical is-8">
        <div class="tile">
          <div class="tile is-parent is-vertical">
            <article class="tile is-child notification is-primary">
              <p class="title">Почта</p>
              <p class="subtitle">Наша электронная почта</p>
              <div class="content">
                  <div class="contact-tile-element">
                      <i class="fa fa-envelope"></i>
                      email@mail.com
                  </div>
                  <div class="contact-tile-element">
                      <i class="fa fa-envelope"></i>
                      email2@mail.com
                  </div>
                  <div class="contact-tile-element">
                      <i class="fa fa-envelope"></i>
                      email3@mail.com
                  </div>
              </div>
            </article>
            <article class="tile is-child notification is-danger">
              <p class="title">Связь</p>
              <p class="subtitle">Номера телефонов</p>
              <div class="content">
                  <div class="contact-tile-element">
                      <i class="fa fa-phone"></i>
                      73123451233
                  </div>
                  <div class="contact-tile-element">
                      <i class="fa fa-phone"></i>
                      73123451233
                  </div>
              </div>
            </article>
          </div>
          <div class="tile is-parent">
            <article class="tile is-child notification is-info">
              <p class="title">Наш логотип</p>
              <p class="subtitle">Вот такой</p>
              <figure class="image is-4by3">
                <img src="https://steemitimages.com/DQmTTGaMc8aVJjrjj4pnKgqqjtdSVMeBpdVhLJ3CbMftmaS/Bitcoin-Logo-640x480.png">
              </figure>
            </article>
          </div>
        </div>
        <div class="tile is-parent">
          <article class="tile is-child notification is-primary">
            <p class="title">Социальные сети</p>
            <p class="subtitle">Наши социальные сети</p>
            <div class="content">
                <span class="contact-tile-element">
                    <i class="fa fa-facebook"></i>
                    &#64;cryptovault
                </span>
                <span class="contact-tile-element">
                    <i class="fa fa-twitter"></i>
                    &#64;cryptovault
                </span>
                <span class="contact-tile-element">
                    <i class="fa fa-vk"></i>
                    &#64;cryptovault
                </span>
            </div>
          </article>
        </div>
      </div>
      <div class="tile is-parent">
        <article class="tile is-child notification is-danger">
          <div class="content">
            <p class="title">Мы - крутые</p>
            <p class="subtitle">И это правда</p>
            <div class="content">
                <div class="contact-tile-element">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi vero corporis natus pariatur, incidunt quod autem, ipsum itaque quia magnam consequatur at. Vero distinctio quibusdam, recusandae suscipit, hic ipsam. Quis.
                </div>
                <div class="contact-tile-element">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni adipisci quos voluptas rerum, fugit laborum numquam sequi, totam temporibus praesentium nulla autem distinctio, sed laudantium eaque necessitatibus. Repellat, officiis illum.
                </div>
                <div class="contact-tile-element">
                     Magni adipisci quos voluptas rerum, fugit laborum numquam sequi, totam temporibus praesentium nulla autem distinctio, sed laudantium eaque necessitatibus. Repellat, officiis illum.
                </div>
            </div>
          </div>
        </article>
      </div>
    </div>

</div>

@endsection
