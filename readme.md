# LaraQuiz: Laravel 5.6 based quiz system

It is a demo project for demonstrating what can be generated with [QuickAdminPanel](https://quickadminpanel.com) tool.
LaraQuiz was mostly generated with __QuickAdmin__ except for some custom code.

It's an open-source version of online Laravel quiz at [LaraQuiz.com](http://laraquiz.com) - but the system can be used for any quiz project, you just fill in different topics and questions.

__Notice__: originally created with Laravel 5.3, it was upgraded to Laravel 5.6 in March 2018.

## Clickable live-demo

[demo-laraquiz.quickadminpanel.com](http://demo-laraquiz.quickadminpanel.com)

- __Email__: admin@admin.com
- __Pass__: password

![LaraQuiz screenshot](https://quickadminpanel.com/assets/pages/demos/demo-laraquiz-01.png)

![LaraQuiz screenshot 2](https://quickadminpanel.com/assets/pages/demos/demo-laraquiz-02.png)

## How to use

#### Using Docker
- Clone the repository with __git clone__
- Run __make setup__
- Access via __http://localhost:8888__

#### Without Docker
- Clone the repository with __git clone__
- Copy __.env.example__ file to __.env__ and edit database credentials there
- Run __composer install__
- Run __php artisan key:generate__
- Run __php artisan migrate --seed__ (it has some seeded data for your testing)
- Now you can login as admin: launch the main URL and login with default credentials __admin@admin.com__ - __password__
- Fill in the database with topics, questions and options
- For social login - fill in the credentials of your social apps in .env file
- That's it - allow people to register and take quizzes!

## License

Basically, feel free to use and re-use any way you want.

---

## More from our LaravelDaily Team

- Read our [Daily Blog with Laravel Tutorials](https://laraveldaily.com)
- FREE E-book: [50 Laravel Quick Tips (and counting)](https://laraveldaily.com/free-e-book-40-laravel-quick-tips-and-counting/)
- Check out our adminpanel generator QuickAdminPanel: [Laravel version](https://quickadminpanel.com) and [Vue.js version](https://vue.quickadminpanel.com)
- Subscribe to our [YouTube channel Laravel Business](https://www.youtube.com/channel/UCTuplgOBi6tJIlesIboymGA)
- Enroll in our [Laravel Online Courses](https://laraveldaily.teachable.com/)
