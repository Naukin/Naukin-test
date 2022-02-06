const APILink = 'https://naukin.com/php/api/index.php?type=posts'

/*

type:
    posts - получение всех постов
    postswithout - получение всех постов без указаного в params

params:
    type=posts&params=name - получение конкретного поста по postName
    type=postswithout&params=name - получение всех постов без указаного
    
*/

var myVue = new Vue({
    el: '.service',
    methods: {
        goToPage: function (link) {
            document.location.href = '/current-service/'+link
        }
    }
})

var last_four_blog = new Vue({
    el: '#last-four-blog',
    data(){
        return{
            postNameToAPI: '',
            postName: '',
            posts: null,
        }
    },
    methods:{
        goToBlog: function (link) {
            document.location.href = '/current-article/'+link
        }
    },
    created: async function (){
        let url = window.location.pathname
        url = url.split('/')
        this.postNameToAPI = url[2]

        let link2 = APILink + 'without&params='+this.postNameToAPI
        let res2 = await fetch(link2)
        this.posts = await res2.json()        //получаю данные в json
        this.posts = this.posts.reverse()

    },
})

let myBlog = new Vue({
    el: '#all-articles',
    data(){
        return{
            postName: '',
            posts: null,
        }
    },
    methods:{
       goToBlog: function (link) {
            document.location.href = '/current-article/'+link
        }
    },
    created: async function (){
        let link = APILink
        let res = await fetch(link)
        this.posts = await res.json()        //получаю данные в json
        this.posts = this.posts.reverse()

    }
})

let currentArticle = new Vue({
    el: '#read_blog',
    data(){
        return{
            postNameToAPI: '',
            post: null, //конкретный пост который прсматриваем сейчас
            posts:null , //все отсальные посты
            postName: '',
        }
    },
    methods:{
        async getContent(){
            let url = window.location.pathname
            url = url.split('/')
            this.postNameToAPI = url[2]

            let link = APILink +"&params="+ this.postNameToAPI
            let res = await fetch(link)
            this.post = await res.json()        //получаю данные в json


            let link2 = APILink + 'without&params='+this.postNameToAPI
            let res2 = await fetch(link2)
            this.posts = await res2.json()        //получаю данные в json
            this.posts = this.posts.reverse()
        }
    },
    async created(){
        await this.getContent()
    },
    watch:{
        async postName(){
            await this.getContent()
            document.location.reload()
        }
    }
})


magicMouse ({
    "outerWidth": 70,
    "outerHeight": 70
});

AOS.init();
