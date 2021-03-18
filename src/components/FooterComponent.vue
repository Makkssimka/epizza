<template>
    <footer class="footer-wrapper">
        <div class="social-line">
            <div class="container">
                <div class="text-social">
                    <img src="/images/megaphone-icon.svg"> Понравилась пицца! Расскажите о нас в социальных сетях
                </div>
                <ul class="list-social">
                    <li>
                        <a href="https://www.instagram.com" target="_blank">
                            <img src="/images/instagram.svg">
                        </a>
                    </li>
                    <li>
                        <a :href="vkShare" target="_blank">
                            <img src="/images/vkontakte.svg">
                        </a>
                    </li>
                    <li>
                        <a :href="okShare" target="_blank">
                            <img src="/images/ok.svg">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="footer-menu">
            <div class="container">
                <div class="footer-list-menu">
                    <ul v-if="isIndex">
                        <li class="head-footer-menu">Наше меню</li>
                        <li><a href="#pizza" @click="scrollAnkhor">Пицца</a></li>
                        <li><a href="#souse" @click.prevent="scrollAnkhor">Соусы</a></li>
                        <li><a href="#zakuski" @click.prevent="scrollAnkhor">Закуски</a></li>
                        <li><a href="#sault" @click.prevent="scrollAnkhor">Салаты</a></li>
                        <li><a href="#drink" @click.prevent="scrollAnkhor">Напитки</a></li>
                        <li><router-link to="/action">Акции</router-link></li>
                    </ul>
                    <ul v-else>
                        <li class="head-footer-menu">Наше меню</li>
                        <li><router-link to="/#pizza" @click="scrollAnkhor">Пицца</router-link></li>
                        <li><router-link to="/#souse" @click.prevent="scrollAnkhor">Соусы</router-link></li>
                        <li><router-link to="/#zakuski" @click.prevent="scrollAnkhor">Закуски</router-link></li>
                        <li><router-link to="/#sault" @click.prevent="scrollAnkhor">Салаты</router-link></li>
                        <li><router-link to="/#drink" @click.prevent="scrollAnkhor">Напитки</router-link></li>
                        <li><router-link to="/action">Акции</router-link></li>
                    </ul>
                    <ul>
                        <li class="head-footer-menu">О нас</li>
                        <li><router-link to="/contact">Контакты</router-link></li>
                        <li><a target="_blank" href="https://yadi.sk/i/wsxtsEAhnmK_hQ">Политика конфиденциальности</a></li>
                    </ul>
                </div>
                <div class="footer-list-number">
                    <a href="tel:+79061718118">+7 906 17-18-118</a>
                    <p>Звонок бесплатный</p>
                    <div class="time-footer">
                        <div class="time-footer-time">
                            с <span>10:00</span> до <span>22:30</span>
                        </div>
                        <div>режим работы</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                <div>
                    2018-{{ todey }} &#169; <router-link to="/">Ёpizza</router-link>
                </div>
            </div>
        </div>
    </footer>
</template>

<script>
import scrollTo from "scroll-to-element";

export default {
    methods: {
        scrollAnkhor: function(e){
            let idElem = e.target.hash;
            let elem = document.querySelector(idElem);
            scrollTo(elem, {
                offset: -70,
                ease: 'out-expo'
            });
        }
    },
    computed: {
        vkShare: function(){
            return `https://vk.com/share.php?url=https://epizza.su`;
        },
        okShare: function(){
            return `https://connect.ok.ru/offer?url=https://epizza.su`;
        },
        todey: function(){
            return new Date().getFullYear();
        },
        isIndex: function(){
            return (this.$route.path == '/')?true:false;
        }
    }
}
</script>