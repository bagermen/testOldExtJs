Ext.define('App.Grid', {
    extend: 'Ext.grid.EditorGridPanel',
    pageSize: 25,
    initComponent: function() {
        this.store = this.createStore();
        this.columns = this.createColumns();
        this.sm = new Ext.grid.RowSelectionModel({
            singleSelect: true
        });
        this.tbar = this.createTbarCfg();
        this.bbar = this.createBbarCfg();

        this.addEvents('search');
        App.Grid.superclass.initComponent.call(this);
        this.on('search', function() {
            var data = this.filter.getValues();
            var store = this.getStore();
            Ext.apply(store.baseParams, data);

            store.load();
        }, this);
    },

    /**
     * Store
     * @returns {Ext.data.JsonStore}
     */
    createStore: function() {
        return new Ext.data.JsonStore({
            autoDestroy: true,
            autoLoad: false,
            autoSave: false,
            restful: true,
            proxy: new Ext.data.HttpProxy({url:'/calenders'}),
            writer: new Ext.data.JsonWriter({writeAllFields: true}),
            root: 'data',
            totalProperty: 'totalCount',
            idProperty: 'cid',
            remoteSort: true,
            fields: [
                { name: 'cid', type: 'int'},
                { name: 'year', type: 'string', useNull: true},
                { name: 'name', type: 'string', useNull: true},
                { name: 'city', type: 'string', useNull: true},
                { name: 'country', type: 'string', useNull: true},
                { name: 'begin', type: 'date', 'dateFormat': 'c', useNull: true},
                { name: 'tot', type: 'date', 'dateFormat': 'c', useNull: true},
                { name: 'holder', type: 'string', useNull: true},
                { name: 'status', type: 'string', useNull: true},
                { name: 'logo', type: 'string', useNull: true},
                { name: 'type', type: 'string', useNull: true},
                { name: 'game', type: 'string', useNull: true},
                { name: 'note', type: 'string', useNull: true},
                { name: 'url', type: 'string', useNull: true},
                { name: 'contactName', type: 'string', useNull: true},
                { name: 'contactEmail', type: 'string', useNull: true},
                { name: 'contactPhone', type: 'string', useNull: true},
                { name: 'nameRu', type: 'string', useNull: true},
                { name: 'ip', type: 'string', useNull: true},
                { name: 'recognition', type: 'string', defaultValue: '0'},
                { name: 'wcupStars', type: 'int'},
                { name: 'isResult', type: 'string', defaultValue: '0'},
                { name: 'liveUrl', type: 'string', useNull: true},
                { name: 'tourLogo', type: 'string', useNull: true},
                { name: 'datesSure', type: 'bool', useNull: true},
                { name: 'placeSure', type: 'bool', useNull: true},
                { name: 'tempo', type: 'string', defaultValue: 'classic'},
                { name: 'isOpen', type: 'bool', useNull: true},
                { name: 'fee', type: 'float', useNull: true},
                { name: 'isYouth', type: 'bool', useNull: true},
                { name: 'ageСategories', type: 'string'},
                { name: 'addedDate', type: 'date', 'dateFormat': 'c', useNull: true}
            ]
        });
    },

    /**
     * Columns with editors
     * @returns {*[]}
     */
    createColumns: function() {
        var yearEditor = Ext.create({
            xtype: 'numberfield',
            allowBlank: true,
            allowDecimals: false
        });
        var nameEditor = Ext.create({
            xtype: 'textfield',
            allowBlank: true,
            maxLength: 100
        });
        var cityEditor = Ext.create({
            xtype: 'textfield',
            allowBlank: true,
            maxLength: 40
        });

        var dateEditor = Ext.create({
            xtype: 'datefield',
            allowBlank: true,
            format: 'm/d/Y'
        });
        var totEditor = Ext.create({
            xtype: 'datefield',
            allowBlank: true,
            format: 'm/d/Y'
        });

        var holderEditor = Ext.create({
            xtype: 'textfield',
            allowBlank: true,
            maxLength: 40
        });

        var statusEditor = Ext.create({
            xtype: 'checkbox'
        });

        var logoEditor = Ext.create({
            xtype: 'textfield',
            allowBlank: true,
            maxLength: 40
        });

        var imgTpl = new Ext.Template('<img style="height: 30px;width: 30px;" src="{0}">');
        imgTpl.compile();

        var typeEditor = Ext.create({
            xtype: 'checkbox'
        });

        var gameEditor = Ext.create({
            xtype: 'textfield',
            allowBlank: true,
            maxLength: 3
        });

        var noteEditor = Ext.create({
            xtype: 'textarea',
            allowBlank: true,
            maxLength: 16777215
        });

        var urlEditor = Ext.create({
            xtype: 'textarea',
            allowBlank: true,
            maxLength: 255,
            vtype: 'url'
        });

        var contactNameEditor = Ext.create({
            xtype: 'textfield',
            allowBlank: true,
            maxLength: 40
        });

        var contactEmailEditor = Ext.create({
            xtype: 'textfield',
            allowBlank: true,
            maxLength: 40
        });

        var contactPhoneEditor = Ext.create({
            xtype: 'textfield',
            allowBlank: true,
            maxLength: 40
        });

        var nameRuEditor = Ext.create({
            xtype: 'textfield',
            allowBlank: true,
            maxLength: 40
        });

        var ipEditor = Ext.create({
            xtype: 'textfield',
            allowBlank: true,
            maxLength: 15
        });

        var recognitionEditor = Ext.create({
            xtype: 'combo',
            allowBlank: true,
            mode: 'local',
            store: ['0', '1'],
            autoSelect: true,
            forceSelection: true,
            hiddenValue: '0'
        });

        var wcupStarsEditor = Ext.create({
            xtype: 'numberfield',
            allowBlank: false,
            allowDecimals: false
        });

        var isResultEditor = Ext.create({
            xtype: 'combo',
            allowBlank: true,
            mode: 'local',
            store: ['0', '1'],
            autoSelect: true,
            forceSelection: true,
            hiddenValue: '0'
        });

        var liveUrlEditor = Ext.create({
            xtype: 'textfield',
            allowBlank: true,
            maxLength: 255,
            vtype: 'url'
        });

        var tourLogoEditor = Ext.create({
            xtype: 'textfield',
            allowBlank: true,
            maxLength: 40
        });

        var datesSureEditor = Ext.create({
            xtype: 'checkbox'
        });

        var tempoEditor = Ext.create({
            xtype: 'combo',
            allowBlank: true,
            mode: 'local',
            store: ['classic','rapid','blitz'],
            autoSelect: true,
            forceSelection: true,
            hiddenValue: 'classic'
        });

        var isOpenEditor = Ext.create({
            xtype: 'checkbox'
        });

        var feeEditor = Ext.create({
            xtype: 'numberfield',
            allowBlank: true,
            allowDecimals: true,
            allowNegative: true
        });

        var isYouthEditor = Ext.create({
            xtype: 'checkbox'
        });

        var ageCategoriesEditor = Ext.create({
            xtype: 'textfield',
            allowBlank: true
        });

        return [
            { header: "cid", dataIndex: 'cid', editable: false, sortable: true, renderer: 'htmlEncode' },
            { header: "year", dataIndex: 'year', editable: true, editor: yearEditor, sortable: true, renderer: 'htmlEncode'},
            { header: "name", dataIndex: 'name', editable: true, editor: nameEditor, sortable: true, renderer: 'htmlEncode'},
            { header: "city", dataIndex: 'city', editable: true, editor: cityEditor, sortable: true, renderer: 'htmlEncode'},
            { header: "begin", dataIndex: 'begin', editable: true, editor: dateEditor, sortable: true, xtype: "datecolumn", format: 'm/d/Y' },
            { header: "tot", dataIndex: 'tot', editable: true, editor: totEditor, sortable: true, xtype: "datecolumn", format: 'm/d/Y' },
            { header: "holder", dataIndex: 'holder', editable: true, editor: holderEditor, sortable: true, renderer: 'htmlEncode'},
            { header: "status", dataIndex: 'status', editable: true, xtype: "booleancolumn", editor: statusEditor, sortable: true},
            { header: "logo", dataIndex: 'logo', editable: true, editor: logoEditor, sortable: true, renderer: function(v) {
                if (v) {
                    return imgTpl.apply([v.toString()]);
                }
            }},
            { header: "type", dataIndex: 'type', editable: true, xtype: "booleancolumn", editor: typeEditor, sortable: true},
            { header: "game", dataIndex: 'game', editable: true, editor: gameEditor, sortable: true, renderer: 'htmlEncode'},
            { header: "note", dataIndex: 'note', editable: true, editor: noteEditor, sortable: true, renderer: 'htmlEncode'},
            { header: "url", dataIndex: 'url', editable: true, editor: urlEditor, sortable: true, renderer: 'htmlEncode'},
            { header: "contact_name", dataIndex: 'contactName', editable: true, editor: contactNameEditor, sortable: true, renderer: 'htmlEncode'},
            { header: "contact_email", dataIndex: 'contactEmail', editable: true, editor: contactEmailEditor, sortable: true, renderer: 'htmlEncode'},
            { header: "contact_phone", dataIndex: 'contactPhone', editable: true, editor: contactPhoneEditor, sortable: true, renderer: 'htmlEncode'},
            { header: "name_ru", dataIndex: 'nameRu', editable: true, editor: nameRuEditor, sortable: true, renderer: 'htmlEncode'},
            { header: "ip", dataIndex: 'ip', editable: true, editor: ipEditor, sortable: true, renderer: 'htmlEncode'},
            { header: "recognition", dataIndex: 'recognition', editable: true, editor: recognitionEditor, sortable: true, renderer: 'htmlEncode'},
            { header: "wcup_stars", dataIndex: 'wcupStars', editable: true, editor: wcupStarsEditor, sortable: true, renderer: 'htmlEncode'},
            { header: "is_result", dataIndex: 'isResult', editable: true, editor: isResultEditor, sortable: true, renderer: 'htmlEncode'},
            { header: "live_url", dataIndex: 'liveUrl', editable: true, editor: liveUrlEditor, sortable: true, renderer: 'htmlEncode'},
            { header: "tour_logo", dataIndex: 'tourLogo', editable: true, editor: tourLogoEditor, sortable: true, renderer: function(v) {
                if (v) {
                    return imgTpl.apply([v.toString()]);
                }
            }},
            { header: "dates_sure", dataIndex: 'datesSure', editable: true, xtype: "booleancolumn", editor: datesSureEditor, sortable: true},
            { header: "place_sure", dataIndex: 'placeSure', editable: true, xtype: "booleancolumn", editor: datesSureEditor, sortable: true},
            { header: "tempo", dataIndex: 'tempo', editable: true, editor: tempoEditor, sortable: true, renderer: 'htmlEncode'},
            { header: "is_open", dataIndex: 'isOpen', editable: true, xtype: "booleancolumn", editor: isOpenEditor, sortable: true},
            { header: "fee", dataIndex: 'fee', editable: true, editor: feeEditor, sortable: true, renderer: 'htmlEncode'},
            { header: "is_youth", dataIndex: 'isYouth', editable: true, xtype: "booleancolumn", editor: isYouthEditor, sortable: true, renderer: 'htmlEncode'},
            { header: "age_categories", dataIndex: 'ageСategories', editable: true, editor: ageCategoriesEditor, sortable: true, renderer: 'htmlEncode'},
            { header: "added_date", dataIndex: 'addedDate', editable: false,  sortable: true, xtype: "datecolumn", format: 'm/d/Y H:i:s' }
        ];
    },

    /**
     * tbar config
     * @returns {*[]}
     */
    createTbarCfg: function() {
        var self = this;
        this.filter = Ext.create({
            xtype: 'app_filter',
            width: 300,
            grid: self
        });

        return [
            {
                xtype: 'button',
                text: 'Create',
                scope: this,
                handler: function() {
                    if (!self.editing) {
                        var store = self.getStore();
                        var rec;
                        store.each(function(r) {
                            if (!Ext.isNumber(r.get('cid'))) {
                                rec = r;
                            }
                        }, this);
                        if (!rec) {
                            rec = new store.recordType();
                            store.add(rec);
                        }
                        self.startEditing(store.indexOf(rec), self.getColumnModel().findColumnIndex('year'));
                    }
                }
            },
            '-',
            {
                xtype: 'button',
                text: 'Delete',
                scope: this,
                handler: function() {
                    var store = self.getStore();
                    var rec = self.getSelectionModel().getSelected();

                    if (rec) {
                        self.stopEditing(true);
                        store.remove(rec);
                        store.save();
                    }
                }
            },
            '-',
            {
                xtype: 'button',
                text: 'Save',
                scope: this,
                handler: function() {
                    self.getStore().save();
                }
            },
            '->',
            this.filter
        ]
    },

    /**
     *
     * @returns {{xtype: string, pageSize: *, store: (Ext.data.Store|*), displayInfo: boolean, emptyMsg: string}[]}
     */
    createBbarCfg: function() {
        return [
            {
                xtype: 'paging',
                pageSize: this.pageSize,
                store: this.getStore(),
                displayInfo: true,
                emptyMsg: "Empty list"
            }
        ]
    }

});

Ext.reg('app_grid', App.Grid);