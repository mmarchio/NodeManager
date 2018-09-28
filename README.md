Node Manager

Provides a simplistic UI to add and keep track of node tables

****Installation****
1. add the following line to app/AppKernel.php.
```$xslt
new mmarchio\NodeManagerBundle\mmarchioNodeManagerBundle(),

```

2. add the following to app/config/routing.yml.
```$xslt
mmarchio_node_manager:
    resource: "@mmarchioNodeManagerBundle/Controller/"
    type:     annotation
    prefix:   /

```

3. add the following to app/config/config.yml.
```aidl
twig:
    paths:
          "%kernel.project_dir%/src/mmarchio/NodeManagerBundle/Resources/views": NodeManager

```

4. add the following to composer.json.
```aidl
        "psr-4": {
            "mmarchio\\": "src/mmarchio"
        }    

```

4. run
```aidl
php bin/console asset:install --symlink
```