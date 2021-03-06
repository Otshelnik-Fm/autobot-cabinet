## Описание:  

Дополнение для WordPress плагина [WP-Recall](https://wordpress.org/plugins/wp-recall/) - и входящего в его комплект дополнения Rcl Chat (Чат)  
- Позволяет писать пользователю личные сообщения в одностороннем порядке от одного пользователя ("Автобот" - моё оригинальное название, но вы можете назвать этого пользователя как хотите)  
- Перейдя в кабинет к "Автоботу" вы у него не увидите ниодной вкладки в личном кабинете кроме одной "Сообщения сайта"  
- Ответ ему так же невозможно написать. А непрочитанное сообщение спустя час отправится пользователю на его E-Mail.  

- В реколлбаре появится новая иконка "Сообщения" - которая будет показывать наличие сообщения от Автобота. По клику на него переходим в его кабинет. Сообщение подсвечивается.  
- Пользователь в своем кабинете на вкладке "Чат" также видит сообщение от Автобота в списке контактов (если сообщение было)  

- Гость в кабинете автобота увидит текст:  
> "Этот бот сможет рассылать вам новости сайта, подписки и уведомления. Войдите на сайт и проверьте его работу"

------------------------------


## Demo:  

Демонстрация работы на [моем сайте](https://otshelnik-fm.ru/author/autobot/).  
Демо дополнений к автоботу - [чат-боты](https://otshelnik-fm.ru/chat/) - нужно залогиниться чтобы увидеть.  
После регистрации приветственное сообщение от допа [Bonus on Registration](https://codeseller.ru/products/bonus-on-registration-bonus-za-registraciyu-i-lichnoe-soobshhenie/)  
А после оформления подписки через доп [Subscription Two](https://codeseller.ru/products/subscription-two/) - автобот отправляет сообщения  

Видео:  
[![See video](https://img.youtube.com/vi/IXerberpR1o/0.jpg)](https://www.youtube.com/watch?v=IXerberpR1o "See video")  

------------------------------

## Установка/Обновление  

**Установка:**  
Т.к. это дополнение для WordPress плагина WP-Recall, то оно устанавливается через [менеджер дополнений WP-Recall](https://codeseller.ru/obshhie-svedeniya-o-dopolneniyax-wp-recall/)  

1. В админке вашего сайта перейдите на страницу "WP-Recall" -> "Дополнения" и в самом верху нажмите на кнопку "Обзор", выберите .zip архив дополнения на вашем пк и нажмите кнопку "Установить".  
2. В списке загруженных дополнений, на этой странице, найдите это дополнение, наведите на него курсор мыши и нажмите кнопку "Активировать". Или выберите чекбокс и в выпадающем списке действия выберите "Активировать". Нажмите применить.  


**Обновление:**  
Дополнение поддерживает [автоматическое обновление](https://codeseller.ru/avtomaticheskie-obnovleniya-dopolnenij-plagina-wp-recall/) - два раза в день отправляются вашим сервером запросы на обновление.  
Если в течении суток вы не видите обновления (а на странице дополнения вы видите что версия вышла новая), советую ознакомиться с этой [статьёй](https://codeseller.ru/post-group/rabota-wordpress-krona-cron-prinuditelnoe-vypolnenie-kron-zadach-dlya-wp-recall/) 

------------------------------

## Настройки:  
1. Вы создаете (регистрируете) нового пользователя на своем сайте. Например "Автобот"  
2. Логинетесь им на сайте, загружаете ему аватарку, обложку, выставляете отображаемое имя  
3. В админке, в списке пользователей находите его и наводите курсор на его логин или "изменить" - [скриншот](https://yadi.sk/i/6lWNkCrO3QXyuw)  
Слева внизу увидите его id  
4. Этот id вставляете в настройках дополнения: WP-Recall -> Настройки -> Настройки AutoBot и сохраняете  
Теперь система будет знать - кабинет какого пользователя ей изменить  

Если у вас стоят дополнения: [Hello private message](https://codeseller.ru/?p=8341),  [Bonus on Registration](https://codeseller.ru/?p=8350) или [Subscription Two](https://codeseller.ru/?p=16774) то этот же id указывайте в их настройках и они начнут отправлять сообщения от имени Автобота  

------------------------------

## FAQ:  
**С какими дополнениями он работает:**  

[Hello private message](https://codeseller.ru/?p=8341)  
[Bonus on Registration](https://codeseller.ru/?p=8350)  
[Subscription Two](https://codeseller.ru/?p=16774)  


+дополнения чат-ботов  
[Bot AnekBot (анекдоты)](https://codeseller.ru/?p=17441)  
[Bot Bash.org (истории с Bash.org)](https://codeseller.ru/?p=17446)  
[Bot Exchange Rates (курсы доллара и евро)](https://codeseller.ru/?p=17450)  
[Bot Rules (правила чата)](https://codeseller.ru/?p=17454)  
[Bot User Info (информация о пользователе и краткая статистика)](https://codeseller.ru/?p=17458)  
[Bot Weather In The City (Погода в заданном городе)](https://codeseller.ru/?p=17655)  


**Не могу ему написать:**  
всё верно - это односторонний чат для уведомлений  


**Работа с какими шаблонами личного кабинета проверялась:**  
Sunshine, Grace, Across Ocean, Across Ocean - PRO, Clear Sky, Line, Simple Theme, Theme Control  


**Какие еще варианты использования:**  
если надо пользователю выслать предупреждение за какое либо нарушение без обсуждения - Автобот идеальный инструмент. Непрочитанное в течении часа сообщение отправится пользователю на его e-mail.  
Авторизуйтесь им на своем сайте и отправляйте сообщение как в обычном чате в личных сообщениях.  


**Есть описание API и работы с ним? как расширить?**  
- да. В одной записи я сделал обзор некоторых функций и пример добавления чат-бота: [Пишем дочернее дополнение для WP-Recall — чат-бот погоды в городе (используя ядро допа AutoBot Cabinet)](https://codeseller.ru/?p=17464)   



------------------------------

## Changelog:  
Смотри на [странице дополнения](https://codeseller.ru/products/autobot-cabinet/?product-section=Changelog)  

------------------------------


## Поддержка и контакты:  

* Поддержка осуществляется в рамках текущего функционала дополнения  
* При возникновении проблемы, создайте соотвествующую тему на форуме поддержки товара  
* Если вам нужна доработка под ваши нужды - вы можете обратиться ко мне в [ЛС](https://codeseller.ru/author/otshelnik-fm/?tab=chat) с техзаданием на платную доработку.  

Полный список моих работ опубликован на [моём сайте](https://otshelnik-fm.ru/all-my-addons-for-wp-recall/) и в каталоге магазина [CodeSeller.ru](https://codeseller.ru/author/otshelnik-fm/?tab=publics&subtab=type-products)  

------------------------------

## Author  

**Wladimir Druzhaev** (Otshelnik-Fm)  


