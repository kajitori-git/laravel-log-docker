# laravel-log-docker
Output laravel log to docker logs only 2 steps.  

## How to use
- Install this command.

```
composer require kajitori-git/laravel-log-docker
```

- Update .env file.

```
# Change log channel
LOG_CHANNEL=docker


#### Optional : if need, append this config

# Log level. Default is 'error'
LOG_LEVEL_DOCKER=debug  

# Log format.
LOG_FORMATTER_DOCKER=  
```


## Support laravel version
Now I support this version of Laravel. (I will append other versions.)

- Laravel 5.6
