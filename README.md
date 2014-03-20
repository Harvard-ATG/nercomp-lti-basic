## BUILDING TOOLS WITH THE LEARNING TOOL INTEROPERABILITY SPECIFICATION

The IMS Learning Tools Interoperability specification aims to establish a standard for integrating learning tools into a variety of platforms, such as an institution's learning management system. But what is LTI, specifically? How do you go about designing software to take advantage of it? And how do you actually integrate it with an LMS? Join us on a journey that starts with the basics of LTI—what it is and what it does—and ends with the implementation of a simple LTI tool that can be integrated into various LMS frameworks.

**OBJECTIVES:** 
- Understand the basics of the LTI specification 
- Know how to build a simple LTI tool in one of your favorite web application development languages such as PHP or Python 
- Be able to integrate your LTI tool into their favorite LMS 
- Gain access to a variety of LTI resources, such as tutorials, online courses, code libraries, and more

[Source](http://www.educause.edu/nercomp-conference/2014/2014/building-tools-learning-tool-interoperability-specification)

## Demo Quickstart

You will need [vagrant](http://www.vagrantup.com/), [virtual box](https://www.virtualbox.org/), and [git](http://git-scm.com/) installed.

```sh
$ git clone https://github.com/Harvard-ATG/nercomp-lti-basic.git
$ cd nercomp-lti-basic/demo
$ vagrant up
```

Open [http://localhost:8080/](http://localhost:8080). You should see a message saying *It works!*.

To view, modify, or just play around with the LTI demo tool code:

```sh
$ vagrant ssh
$ cd /var/www/lti-basic
$ ls -l
```

Good luck, have fun!
