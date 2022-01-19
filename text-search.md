# text search

````
use myDB
db.createCollection("books")
````

````
db.books.insert([
	{
      "title": "Eloquent JavaScript, Second Edition",
      "subtitle": "A Modern Introduction to Programming",
      "author": "Marijn Haverbeke",
      "publisher": "No Starch Press",
      "description": "JavaScript lies at the heart of almost every modern web application, from social apps to the newest browser-based games. Though simple for beginners to pick up and play with, JavaScript is a flexible, complex language that you can use to build full-scale applications."
    },
    {
      "title": "Learning JavaScript Design Patterns",
      "subtitle": "A JavaScript and jQuery Developer's Guide",
      "author": "Addy Osmani",
      "publisher": "O'Reilly Media",
      "description": "With Learning JavaScript Design Patterns, you'll learn how to write beautiful, structured, and maintainable JavaScript by applying classical and modern design patterns to the language. If you want to keep your code efficient, more manageable, and up-to-date with the latest best practices, this book is for you."
    },
    {
      "title": "Speaking JavaScript",
      "subtitle": "An In-Depth Guide for Programmers",
      "author": "Axel Rauschmayer",
      "publisher": "O'Reilly Media",
      "description": "Like it or not, JavaScript is everywhere these days, from browser to server to mobile and now you, too, need to learn the language or dive deeper than you have. This concise book guides you into and through JavaScript, written by a veteran programmer who once found himself in the same position."
    },
    {
      "title": "Programming JavaScript Applications",
      "subtitle": "Robust Web Architecture with Node, HTML5, and Modern JS Libraries",
      "author": "Eric Elliott",
      "publisher": "O'Reilly Media",
      "description": "Take advantage of JavaScript's power to build robust web-scale or enterprise applications that are easy to extend and maintain. By applying the design patterns outlined in this practical book, experienced JavaScript developers will learn how to write flexible and resilient code that's easier-yes, easier-to work with as your codebase grows."
    },
    {
      "title": "Understanding ECMAScript 6",
      "subtitle": "The Definitive Guide for JavaScript Developers",
      "author": "Nicholas C. Zakas",
      "publisher": "No Starch Press",
      "description": "ECMAScript 6 represents the biggest update to the core of JavaScript in the history of the language. In Understanding ECMAScript 6, expert developer Nicholas C. Zakas provides a complete guide to the object types, syntax, and other exciting changes that ECMAScript 6 brings to JavaScript."
    }
])
````


````
db.books.createIndex({"description":"text"})
````



````
db.books.createIndex({"subtitle":"text","description":"text"})
````

# search
````
db.books.find({$text: {$search: "ECMAScript"}})
````



````
>db.books.find({$text: {$search: "ECMAScript"}},{ subtitle: 1, description: 1 })
	{
    "_id" : ObjectId("602b09cb3cb6144ada1c62fe"),
    "subtitle" : "The Definitive Guide for JavaScript Developers",
    "description" : "ECMAScript 6 represents the biggest update to the core of JavaScript in the history of the language. In Understanding ECMAScript 6, expert developer Nicholas C. Zakas provides a complete guide to the object types, syntax, and other exciting changes that ECMAScript 6 brings to JavaScript."
	}
>
````


````
>db.books.find({$text: {$search: "modern design patterns"}},{ subtitle: 1, description: 1 })
	{
    "_id" : ObjectId("602b098f3cb6144ada1c2ea1"),
    "subtitle" : "A JavaScript and jQuery Developer's Guide",
    "description" : "With Learning JavaScript Design Patterns, you'll learn how to write beautiful, structured, and maintainable JavaScript by applying classical and modern design patterns to the language. If you want to keep your code efficient, more manageable, and up-to-date with the latest best practices, this book is for you."
	},
	{
    "_id" : ObjectId("602b09b93cb6144ada1c4bca"),
    "subtitle" : "Robust Web Architecture with Node, HTML5, and Modern JS Libraries",
    "description" : "Take advantage of JavaScript's power to build robust web-scale or enterprise applications that are easy to extend and maintain. By applying the design patterns outlined in this practical book, experienced JavaScript developers will learn how to write flexible and resilient code that's easier-yes, easier-to work with as your code base grows.",
	},
	{
    "_id" : ObjectId("602b095c3cb6144ada1c1028"),
    "subtitle" : "A Modern Introduction to Programming",
    "description" : "JavaScript lies at the heart of almost every modern web application, from social apps to the newest browser-based games. Though simple for beginners to pick up and play with, JavaScript is a flexible, complex language that you can use to build full-scale applications."
	}
>
````

````
>db.books.find({$text: {$search: "\"modern design patterns\""}},{ subtitle: 1, description: 1 })
	{
    "_id" : ObjectId("602b098f3cb6144ada1c2ea1"),
    "subtitle" : "A JavaScript and jQuery Developer's Guide",
    "description" : "With Learning JavaScript Design Patterns, you'll learn how to write beautiful, structured, and maintainable JavaScript by applying classical and modern design patterns to the language. If you want to keep your code efficient, more manageable, and up-to-date with the latest best practices, this book is for you."
}
````

````
>db.books.find({$text: {$search: "JavaScript -HTML5 -ECMAScript"}},{ subtitle: 1, description: 1 })
	{
    "_id" : ObjectId("602b098f3cb6144ada1c2ea1"),
    "subtitle" : "A JavaScript and jQuery Developer's Guide",
    "description" : "With Learning JavaScript Design Patterns, you'll learn how to write beautiful, structured, and maintainable JavaScript by applying classical and modern design patterns to the language. If you want to keep your code efficient, more manageable, and up-to-date with the latest best practices, this book is for you."
	},
	{
    "_id" : ObjectId("602b09a83cb6144ada1c4973"),
    "subtitle" : "An In-Depth Guide for Programmers",
    "description" : "Like it or not, JavaScript is everywhere these days, from browser to server to mobile and now you, too, need to learn the language or dive deeper than you have. This concise book guides you into and through JavaScript, written by a veteran programmer who once found himself in the same position."
	},
	{
    "_id" : ObjectId("602b095c3cb6144ada1c1028"),
    "subtitle" : "A Modern Introduction to Programming",
    "description" : "JavaScript lies at the heart of almost every modern web application, from social apps to the newest browser-based games. Though simple for beginners to pick up and play with, JavaScript is a flexible, complex language that you can use to build full-scale applications."
	}

````


````
>db.books.find({$text: {$search: "JavaScript "}},{score: {$meta: "textScore"}, subtitle: 1, description: 1 }).sort({score:{$meta:"textScore"}})
	{
    "_id" : ObjectId("602b098f3cb6144ada1c2ea1"),
    "subtitle" : "A JavaScript and jQuery Developer's Guide",
    "description" : "With Learning JavaScript Design Patterns, you'll learn how to write beautiful, structured, and maintainable JavaScript by applying classical and modern design patterns to the language. If you want to keep your code efficient, more manageable, and up-to-date with the latest best practices, this book is for you.",
    "score" : 1.43269230769231
	},
	{
    "_id" : ObjectId("602b09cb3cb6144ada1c62fe"),
    "subtitle" : "The Definitive Guide for JavaScript Developers",
    "description" : "ECMAScript 6 represents the biggest update to the core of JavaScript in the history of the language. In Understanding ECMAScript 6, expert developer Nicholas C. Zakas provides a complete guide to the object types, syntax, and other exciting changes that ECMAScript 6 brings to JavaScript.",
    "score" : 1.42672413793103
	},
	{
    "_id" : ObjectId("602b09a83cb6144ada1c4973"),
    "subtitle" : "An In-Depth Guide for Programmers",
    "description" : "Like it or not, JavaScript is everywhere these days, from browser to server to mobile and now you, too, need to learn the language or dive deeper than you have. This concise book guides you into and through JavaScript, written by a veteran programmer who once found himself in the same position.",
    "score" : 0.818181818181818
	},
	{
    "_id" : ObjectId("602b095c3cb6144ada1c1028"),
    "subtitle" : "A Modern Introduction to Programming",
    "description" : "JavaScript lies at the heart of almost every modern web application, from social apps to the newest browser-based games. Though simple for beginners to pick up and play with, JavaScript is a flexible, complex language that you can use to build full-scale applications.",
    "score" : 0.801724137931034
	},
	{
    "_id" : ObjectId("602b09b93cb6144ada1c4bca"),
    "subtitle" : "Robust Web Architecture with Node, HTML5, and Modern JS Libraries",
    "description" : "Take advantage of JavaScript's power to build robust web-scale or enterprise applications that are easy to extend and maintain. By applying the design patterns outlined in this practical book, experienced JavaScript developers will learn how to write flexible and resilient code that's easier-yes, easier-to work with as your codebase grows.",
    "score" : 0.792857142857143
	}
	
````




````
>db.books.find({$text: {$search: "is"}},{subtitle: 1, description: 1 })
	Fetched 0 record(s)
````



````
>db.books.find({$text: {$search: " learn"}},{subtitle: 1, description: 1 }) or >db.books.find({$text: {$search: " learning"}},{subtitle: 1, description: 1 })
	{
    "_id" : ObjectId("602b098f3cb6144ada1c2ea1"),
    "subtitle" : "A JavaScript and jQuery Developer's Guide",
    "description" : "With Learning JavaScript Design Patterns, you'll learn how to write beautiful, structured, and maintainable JavaScript by applying classical and modern design patterns to the language. If you want to keep your code efficient, more manageable, and up-to-date with the latest best practices, this book is for you."
	},
	{
    "_id" : ObjectId("602b09a83cb6144ada1c4973"),
    "subtitle" : "An In-Depth Guide for Programmers",
    "description" : "Like it or not, JavaScript is everywhere these days, from browser to server to mobile and now you, too, need to learn the language or dive deeper than you have. This concise book guides you into and through JavaScript, written by a veteran programmer who once found himself in the same position."
	},
	{
    "_id" : ObjectId("602b09b93cb6144ada1c4bca"),
    "subtitle" : "Robust Web Architecture with Node, HTML5, and Modern JS Libraries",
    "description" : "Take advantage of JavaScript's power to build robust web-scale or enterprise applications that are easy to extend and maintain. By applying the design patterns outlined in this practical book, experienced JavaScript developers will learn how to write flexible and resilient code that's easier-yes, easier-to work with as your codebase grows."
	}

````



