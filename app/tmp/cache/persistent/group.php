<?php $Group = 'a:1:{i:0;O:5:"Group":37:{s:4:"name";s:5:"Group";s:10:"primaryKey";s:3:"_id";s:8:"validate";a:1:{s:4:"name";a:1:{s:8:"notempty";a:1:{s:4:"rule";a:1:{i:0;s:8:"notempty";}}}}s:6:"actsAs";a:1:{s:3:"Acl";a:1:{s:4:"type";s:9:"requester";}}s:12:"cacheQueries";b:1;s:9:"entity_id";N;s:11:"useDbConfig";s:7:"default";s:8:"useTable";s:6:"groups";s:12:"displayField";s:4:"name";s:2:"id";N;s:4:"data";a:0:{}s:5:"table";s:6:"groups";s:7:"_schema";a:4:{s:3:"_id";a:3:{s:4:"type";s:7:"integer";s:7:"primary";b:1;s:6:"length";i:40;}s:4:"name";a:1:{s:4:"type";s:6:"string";}s:7:"created";a:1:{s:4:"type";s:6:"string";}s:8:"modified";a:1:{s:4:"type";s:6:"string";}}s:16:"validationErrors";a:0:{}s:11:"tablePrefix";s:0:"";s:5:"alias";s:5:"Group";s:12:"tableToModel";a:1:{s:6:"groups";s:5:"Group";}s:15:"logTransactions";b:0;s:9:"belongsTo";a:0:{}s:6:"hasOne";a:0:{}s:7:"hasMany";a:0:{}s:19:"hasAndBelongsToMany";a:0:{}s:9:"Behaviors";O:18:"BehaviorCollection":6:{s:9:"modelName";s:5:"Group";s:9:"_attached";a:1:{i:0;s:3:"Acl";}s:9:"_disabled";a:0:{}s:9:"__methods";a:1:{s:4:"node";a:2:{i:0;s:4:"node";i:1;s:3:"Acl";}}s:15:"__mappedMethods";a:0:{}s:3:"Acl";O:11:"AclBehavior":3:{s:10:"__typeMaps";a:2:{s:9:"requester";s:3:"Aro";s:10:"controlled";s:3:"Aco";}s:8:"settings";a:1:{s:5:"Group";a:1:{s:4:"type";s:9:"requester";}}s:10:"mapMethods";a:0:{}}}s:9:"whitelist";a:0:{}s:12:"cacheSources";b:1;s:13:"findQueryType";N;s:9:"recursive";i:1;s:5:"order";N;s:13:"virtualFields";a:0:{}s:17:"__associationKeys";a:4:{s:9:"belongsTo";a:6:{i:0;s:9:"className";i:1;s:10:"foreignKey";i:2;s:10:"conditions";i:3;s:6:"fields";i:4;s:5:"order";i:5;s:12:"counterCache";}s:6:"hasOne";a:6:{i:0;s:9:"className";i:1;s:10:"foreignKey";i:2;s:10:"conditions";i:3;s:6:"fields";i:4;s:5:"order";i:5;s:9:"dependent";}s:7:"hasMany";a:11:{i:0;s:9:"className";i:1;s:10:"foreignKey";i:2;s:10:"conditions";i:3;s:6:"fields";i:4;s:5:"order";i:5;s:5:"limit";i:6;s:6:"offset";i:7;s:9:"dependent";i:8;s:9:"exclusive";i:9;s:11:"finderQuery";i:10;s:12:"counterQuery";}s:19:"hasAndBelongsToMany";a:14:{i:0;s:9:"className";i:1;s:9:"joinTable";i:2;s:4:"with";i:3;s:10:"foreignKey";i:4;s:21:"associationForeignKey";i:5;s:10:"conditions";i:6;s:6:"fields";i:7;s:5:"order";i:8;s:5:"limit";i:9;s:6:"offset";i:10;s:6:"unique";i:11;s:11:"finderQuery";i:12;s:11:"deleteQuery";i:13;s:11:"insertQuery";}}s:14:"__associations";a:4:{i:0;s:9:"belongsTo";i:1;s:6:"hasOne";i:2;s:7:"hasMany";i:3;s:19:"hasAndBelongsToMany";}s:17:"__backAssociation";a:0:{}s:10:"__insertID";N;s:9:"__numRows";N;s:14:"__affectedRows";N;s:12:"_findMethods";a:6:{s:3:"all";b:1;s:5:"first";b:1;s:5:"count";b:1;s:9:"neighbors";b:1;s:4:"list";b:1;s:8:"threaded";b:1;}s:3:"Aro";O:3:"Aro":38:{s:4:"name";s:3:"Aro";s:19:"hasAndBelongsToMany";a:1:{s:3:"Aco";a:14:{s:4:"with";s:10:"Permission";s:9:"className";s:3:"Aco";s:9:"joinTable";s:9:"aros_acos";s:10:"foreignKey";s:6:"aro_id";s:21:"associationForeignKey";s:6:"aco_id";s:10:"conditions";s:0:"";s:6:"fields";s:0:"";s:5:"order";s:0:"";s:5:"limit";s:0:"";s:6:"offset";s:0:"";s:6:"unique";b:1;s:11:"finderQuery";s:0:"";s:11:"deleteQuery";s:0:"";s:11:"insertQuery";s:0:"";}}s:12:"cacheQueries";b:0;s:6:"actsAs";a:1:{s:4:"Tree";s:6:"nested";}s:9:"entity_id";N;s:11:"useDbConfig";s:7:"default";s:8:"useTable";s:4:"aros";s:12:"displayField";s:3:"_id";s:2:"id";b:0;s:4:"data";a:0:{}s:5:"table";s:4:"aros";s:10:"primaryKey";s:3:"_id";s:7:"_schema";a:9:{s:3:"_id";a:2:{s:4:"type";s:6:"string";s:6:"length";i:2000;}s:7:"created";a:2:{s:4:"type";s:8:"datetime";s:7:"default";N;}s:2:"id";a:2:{s:4:"type";s:6:"string";s:6:"length";i:2000;}s:9:"parent_id";a:2:{s:4:"type";s:6:"string";s:6:"length";i:2000;}s:5:"model";a:2:{s:4:"type";s:6:"string";s:6:"length";i:2000;}s:11:"foreign_key";a:2:{s:4:"type";s:6:"string";s:6:"length";i:2000;}s:5:"alias";a:2:{s:4:"type";s:6:"string";s:6:"length";i:2000;}s:3:"lft";a:2:{s:4:"type";s:6:"string";s:6:"length";i:2000;}s:4:"rght";a:2:{s:4:"type";s:6:"string";s:6:"length";i:2000;}}s:8:"validate";a:0:{}s:16:"validationErrors";a:0:{}s:11:"tablePrefix";s:0:"";s:5:"alias";s:3:"Aro";s:12:"tableToModel";a:3:{s:4:"aros";s:3:"Aro";s:4:"acos";s:3:"Aco";s:9:"aros_acos";s:10:"Permission";}s:15:"logTransactions";b:0;s:9:"belongsTo";a:0:{}s:6:"hasOne";a:0:{}s:7:"hasMany";a:0:{}s:9:"Behaviors";O:18:"BehaviorCollection":7:{s:9:"modelName";s:3:"Aro";s:9:"_attached";a:2:{i:0;s:10:"Schemaless";i:1;s:4:"Tree";}s:9:"_disabled";a:0:{}s:9:"__methods";a:11:{s:10:"childcount";a:2:{i:0;s:10:"childcount";i:1;s:4:"Tree";}s:8:"children";a:2:{i:0;s:8:"children";i:1;s:4:"Tree";}s:16:"generatetreelist";a:2:{i:0;s:16:"generatetreelist";i:1;s:4:"Tree";}s:13:"getparentnode";a:2:{i:0;s:13:"getparentnode";i:1;s:4:"Tree";}s:7:"getpath";a:2:{i:0;s:7:"getpath";i:1;s:4:"Tree";}s:8:"movedown";a:2:{i:0;s:8:"movedown";i:1;s:4:"Tree";}s:6:"moveup";a:2:{i:0;s:6:"moveup";i:1;s:4:"Tree";}s:7:"recover";a:2:{i:0;s:7:"recover";i:1;s:4:"Tree";}s:7:"reorder";a:2:{i:0;s:7:"reorder";i:1;s:4:"Tree";}s:14:"removefromtree";a:2:{i:0;s:14:"removefromtree";i:1;s:4:"Tree";}s:6:"verify";a:2:{i:0;s:6:"verify";i:1;s:4:"Tree";}}s:15:"__mappedMethods";a:0:{}s:10:"Schemaless";O:18:"SchemalessBehavior":4:{s:4:"name";s:10:"Schemaless";s:8:"settings";a:0:{}s:19:" * _defaultSettings";a:0:{}s:10:"mapMethods";a:0:{}}s:4:"Tree";O:12:"TreeBehavior":4:{s:6:"errors";a:0:{}s:9:"_defaults";a:7:{s:6:"parent";s:9:"parent_id";s:4:"left";s:3:"lft";s:5:"right";s:4:"rght";s:5:"scope";s:5:"1 = 1";s:4:"type";s:6:"nested";s:14:"__parentChange";b:0;s:9:"recursive";i:-1;}s:8:"settings";a:2:{s:3:"Aco";a:7:{s:6:"parent";s:9:"parent_id";s:4:"left";s:3:"lft";s:5:"right";s:4:"rght";s:5:"scope";s:5:"1 = 1";s:4:"type";s:6:"nested";s:14:"__parentChange";b:0;s:9:"recursive";i:-1;}s:3:"Aro";a:7:{s:6:"parent";s:9:"parent_id";s:4:"left";s:3:"lft";s:5:"right";s:4:"rght";s:5:"scope";s:5:"1 = 1";s:4:"type";s:6:"nested";s:14:"__parentChange";b:0;s:9:"recursive";i:-1;}}s:10:"mapMethods";a:0:{}}}s:9:"whitelist";a:0:{}s:12:"cacheSources";b:1;s:13:"findQueryType";N;s:9:"recursive";i:1;s:5:"order";N;s:13:"virtualFields";a:0:{}s:17:"__associationKeys";a:4:{s:9:"belongsTo";a:6:{i:0;s:9:"className";i:1;s:10:"foreignKey";i:2;s:10:"conditions";i:3;s:6:"fields";i:4;s:5:"order";i:5;s:12:"counterCache";}s:6:"hasOne";a:6:{i:0;s:9:"className";i:1;s:10:"foreignKey";i:2;s:10:"conditions";i:3;s:6:"fields";i:4;s:5:"order";i:5;s:9:"dependent";}s:7:"hasMany";a:11:{i:0;s:9:"className";i:1;s:10:"foreignKey";i:2;s:10:"conditions";i:3;s:6:"fields";i:4;s:5:"order";i:5;s:5:"limit";i:6;s:6:"offset";i:7;s:9:"dependent";i:8;s:9:"exclusive";i:9;s:11:"finderQuery";i:10;s:12:"counterQuery";}s:19:"hasAndBelongsToMany";a:14:{i:0;s:9:"className";i:1;s:9:"joinTable";i:2;s:4:"with";i:3;s:10:"foreignKey";i:4;s:21:"associationForeignKey";i:5;s:10:"conditions";i:6;s:6:"fields";i:7;s:5:"order";i:8;s:5:"limit";i:9;s:6:"offset";i:10;s:6:"unique";i:11;s:11:"finderQuery";i:12;s:11:"deleteQuery";i:13;s:11:"insertQuery";}}s:14:"__associations";a:4:{i:0;s:9:"belongsTo";i:1;s:6:"hasOne";i:2;s:7:"hasMany";i:3;s:19:"hasAndBelongsToMany";}s:17:"__backAssociation";a:0:{}s:10:"__insertID";N;s:9:"__numRows";N;s:14:"__affectedRows";N;s:12:"_findMethods";a:6:{s:3:"all";b:1;s:5:"first";b:1;s:5:"count";b:1;s:9:"neighbors";b:1;s:4:"list";b:1;s:8:"threaded";b:1;}s:3:"Aco";O:3:"Aco":38:{s:4:"name";s:3:"Aco";s:19:"hasAndBelongsToMany";a:1:{s:3:"Aro";a:14:{s:4:"with";s:10:"Permission";s:9:"className";s:3:"Aro";s:9:"joinTable";s:9:"aros_acos";s:10:"foreignKey";s:6:"aco_id";s:21:"associationForeignKey";s:6:"aro_id";s:10:"conditions";s:0:"";s:6:"fields";s:0:"";s:5:"order";s:0:"";s:5:"limit";s:0:"";s:6:"offset";s:0:"";s:6:"unique";b:1;s:11:"finderQuery";s:0:"";s:11:"deleteQuery";s:0:"";s:11:"insertQuery";s:0:"";}}s:12:"cacheQueries";b:0;s:6:"actsAs";a:1:{s:4:"Tree";s:6:"nested";}s:9:"entity_id";N;s:11:"useDbConfig";s:7:"default";s:8:"useTable";s:4:"acos";s:12:"displayField";s:3:"_id";s:2:"id";b:0;s:4:"data";a:0:{}s:5:"table";s:4:"acos";s:10:"primaryKey";s:3:"_id";s:7:"_schema";a:9:{s:3:"_id";a:2:{s:4:"type";s:6:"string";s:6:"length";i:2000;}s:7:"created";a:2:{s:4:"type";s:8:"datetime";s:7:"default";N;}s:2:"id";a:2:{s:4:"type";s:6:"string";s:6:"length";i:2000;}s:9:"parent_id";a:2:{s:4:"type";s:6:"string";s:6:"length";i:2000;}s:5:"model";a:2:{s:4:"type";s:6:"string";s:6:"length";i:2000;}s:11:"foreign_key";a:2:{s:4:"type";s:6:"string";s:6:"length";i:2000;}s:5:"alias";a:2:{s:4:"type";s:6:"string";s:6:"length";i:2000;}s:3:"lft";a:2:{s:4:"type";s:6:"string";s:6:"length";i:2000;}s:4:"rght";a:2:{s:4:"type";s:6:"string";s:6:"length";i:2000;}}s:8:"validate";a:0:{}s:16:"validationErrors";a:0:{}s:11:"tablePrefix";s:0:"";s:5:"alias";s:3:"Aco";s:12:"tableToModel";a:3:{s:4:"acos";s:3:"Aco";s:4:"aros";s:3:"Aro";s:9:"aros_acos";s:10:"Permission";}s:15:"logTransactions";b:0;s:9:"belongsTo";a:0:{}s:6:"hasOne";a:0:{}s:7:"hasMany";a:0:{}s:9:"Behaviors";O:18:"BehaviorCollection":7:{s:9:"modelName";s:3:"Aco";s:9:"_attached";a:2:{i:0;s:10:"Schemaless";i:1;s:4:"Tree";}s:9:"_disabled";a:0:{}s:9:"__methods";a:11:{s:10:"childcount";a:2:{i:0;s:10:"childcount";i:1;s:4:"Tree";}s:8:"children";a:2:{i:0;s:8:"children";i:1;s:4:"Tree";}s:16:"generatetreelist";a:2:{i:0;s:16:"generatetreelist";i:1;s:4:"Tree";}s:13:"getparentnode";a:2:{i:0;s:13:"getparentnode";i:1;s:4:"Tree";}s:7:"getpath";a:2:{i:0;s:7:"getpath";i:1;s:4:"Tree";}s:8:"movedown";a:2:{i:0;s:8:"movedown";i:1;s:4:"Tree";}s:6:"moveup";a:2:{i:0;s:6:"moveup";i:1;s:4:"Tree";}s:7:"recover";a:2:{i:0;s:7:"recover";i:1;s:4:"Tree";}s:7:"reorder";a:2:{i:0;s:7:"reorder";i:1;s:4:"Tree";}s:14:"removefromtree";a:2:{i:0;s:14:"removefromtree";i:1;s:4:"Tree";}s:6:"verify";a:2:{i:0;s:6:"verify";i:1;s:4:"Tree";}}s:15:"__mappedMethods";a:0:{}s:10:"Schemaless";r:234;s:4:"Tree";R:239;}s:9:"whitelist";a:0:{}s:12:"cacheSources";b:1;s:13:"findQueryType";N;s:9:"recursive";i:1;s:5:"order";N;s:13:"virtualFields";a:0:{}s:17:"__associationKeys";a:4:{s:9:"belongsTo";a:6:{i:0;s:9:"className";i:1;s:10:"foreignKey";i:2;s:10:"conditions";i:3;s:6:"fields";i:4;s:5:"order";i:5;s:12:"counterCache";}s:6:"hasOne";a:6:{i:0;s:9:"className";i:1;s:10:"foreignKey";i:2;s:10:"conditions";i:3;s:6:"fields";i:4;s:5:"order";i:5;s:9:"dependent";}s:7:"hasMany";a:11:{i:0;s:9:"className";i:1;s:10:"foreignKey";i:2;s:10:"conditions";i:3;s:6:"fields";i:4;s:5:"order";i:5;s:5:"limit";i:6;s:6:"offset";i:7;s:9:"dependent";i:8;s:9:"exclusive";i:9;s:11:"finderQuery";i:10;s:12:"counterQuery";}s:19:"hasAndBelongsToMany";a:14:{i:0;s:9:"className";i:1;s:9:"joinTable";i:2;s:4:"with";i:3;s:10:"foreignKey";i:4;s:21:"associationForeignKey";i:5;s:10:"conditions";i:6;s:6:"fields";i:7;s:5:"order";i:8;s:5:"limit";i:9;s:6:"offset";i:10;s:6:"unique";i:11;s:11:"finderQuery";i:12;s:11:"deleteQuery";i:13;s:11:"insertQuery";}}s:14:"__associations";a:4:{i:0;s:9:"belongsTo";i:1;s:6:"hasOne";i:2;s:7:"hasMany";i:3;s:19:"hasAndBelongsToMany";}s:17:"__backAssociation";a:0:{}s:10:"__insertID";N;s:9:"__numRows";N;s:14:"__affectedRows";N;s:12:"_findMethods";a:6:{s:3:"all";b:1;s:5:"first";b:1;s:5:"count";b:1;s:9:"neighbors";b:1;s:4:"list";b:1;s:8:"threaded";b:1;}s:3:"Aro";r:124;s:10:"Permission";O:10:"Permission":38:{s:4:"name";s:10:"Permission";s:12:"cacheQueries";b:0;s:8:"useTable";s:9:"aros_acos";s:9:"belongsTo";a:2:{s:3:"Aro";a:6:{s:9:"className";s:3:"Aro";s:10:"foreignKey";s:6:"aro_id";s:10:"conditions";s:0:"";s:6:"fields";s:0:"";s:5:"order";s:0:"";s:12:"counterCache";s:0:"";}s:3:"Aco";a:6:{s:9:"className";s:3:"Aco";s:10:"foreignKey";s:6:"aco_id";s:10:"conditions";s:0:"";s:6:"fields";s:0:"";s:5:"order";s:0:"";s:12:"counterCache";s:0:"";}}s:6:"actsAs";N;s:9:"entity_id";N;s:11:"useDbConfig";s:7:"default";s:12:"displayField";s:3:"_id";s:2:"id";b:0;s:4:"data";a:0:{}s:5:"table";s:9:"aros_acos";s:10:"primaryKey";s:3:"_id";s:7:"_schema";a:13:{s:3:"_id";a:2:{s:4:"type";s:6:"string";s:6:"length";i:2000;}s:7:"created";a:2:{s:4:"type";s:8:"datetime";s:7:"default";N;}s:2:"id";a:2:{s:4:"type";s:6:"string";s:6:"length";i:2000;}s:6:"aro_id";a:2:{s:4:"type";s:6:"string";s:6:"length";i:2000;}s:6:"aco_id";a:2:{s:4:"type";s:6:"string";s:6:"length";i:2000;}s:7:"_create";a:2:{s:4:"type";s:6:"string";s:6:"length";i:2000;}s:5:"_read";a:2:{s:4:"type";s:6:"string";s:6:"length";i:2000;}s:7:"_update";a:2:{s:4:"type";s:6:"string";s:6:"length";i:2000;}s:7:"_delete";a:2:{s:4:"type";s:6:"string";s:6:"length";i:2000;}s:6:"field7";a:2:{s:4:"type";s:6:"string";s:6:"length";i:2000;}s:6:"field8";a:2:{s:4:"type";s:6:"string";s:6:"length";i:2000;}s:6:"field9";a:2:{s:4:"type";s:6:"string";s:6:"length";i:2000;}s:7:"field10";a:2:{s:4:"type";s:6:"string";s:6:"length";i:2000;}}s:8:"validate";a:0:{}s:16:"validationErrors";a:0:{}s:11:"tablePrefix";s:0:"";s:5:"alias";s:10:"Permission";s:12:"tableToModel";a:3:{s:9:"aros_acos";s:10:"Permission";s:4:"aros";s:3:"Aro";s:4:"acos";s:3:"Aco";}s:15:"logTransactions";b:0;s:6:"hasOne";a:0:{}s:7:"hasMany";a:0:{}s:19:"hasAndBelongsToMany";a:0:{}s:9:"Behaviors";O:18:"BehaviorCollection":6:{s:9:"modelName";s:10:"Permission";s:9:"_attached";a:1:{i:0;s:10:"Schemaless";}s:9:"_disabled";a:0:{}s:9:"__methods";a:0:{}s:15:"__mappedMethods";a:0:{}s:10:"Schemaless";r:234;}s:9:"whitelist";a:0:{}s:12:"cacheSources";b:1;s:13:"findQueryType";N;s:9:"recursive";i:1;s:5:"order";N;s:13:"virtualFields";a:0:{}s:17:"__associationKeys";a:4:{s:9:"belongsTo";a:6:{i:0;s:9:"className";i:1;s:10:"foreignKey";i:2;s:10:"conditions";i:3;s:6:"fields";i:4;s:5:"order";i:5;s:12:"counterCache";}s:6:"hasOne";a:6:{i:0;s:9:"className";i:1;s:10:"foreignKey";i:2;s:10:"conditions";i:3;s:6:"fields";i:4;s:5:"order";i:5;s:9:"dependent";}s:7:"hasMany";a:11:{i:0;s:9:"className";i:1;s:10:"foreignKey";i:2;s:10:"conditions";i:3;s:6:"fields";i:4;s:5:"order";i:5;s:5:"limit";i:6;s:6:"offset";i:7;s:9:"dependent";i:8;s:9:"exclusive";i:9;s:11:"finderQuery";i:10;s:12:"counterQuery";}s:19:"hasAndBelongsToMany";a:14:{i:0;s:9:"className";i:1;s:9:"joinTable";i:2;s:4:"with";i:3;s:10:"foreignKey";i:4;s:21:"associationForeignKey";i:5;s:10:"conditions";i:6;s:6:"fields";i:7;s:5:"order";i:8;s:5:"limit";i:9;s:6:"offset";i:10;s:6:"unique";i:11;s:11:"finderQuery";i:12;s:11:"deleteQuery";i:13;s:11:"insertQuery";}}s:14:"__associations";a:4:{i:0;s:9:"belongsTo";i:1;s:6:"hasOne";i:2;s:7:"hasMany";i:3;s:19:"hasAndBelongsToMany";}s:17:"__backAssociation";a:0:{}s:10:"__insertID";N;s:9:"__numRows";N;s:14:"__affectedRows";N;s:12:"_findMethods";a:6:{s:3:"all";b:1;s:5:"first";b:1;s:5:"count";b:1;s:9:"neighbors";b:1;s:4:"list";b:1;s:8:"threaded";b:1;}s:3:"Aro";r:124;s:3:"Aco";r:331;}}s:10:"Permission";r:507;}}}' ?>