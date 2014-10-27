tinymce.PluginManager.add('rnrShortcodes', function(ed, url) {

    // Add a button that opens a window
    ed.addButton('rnr_button', {
        type: 'splitbutton',
        text: '',
        icon: 'rnrscg',
        tooltip: 'RockNRolla Shortcodes',        
        menu:   [

                    {
                        text: 'Accordions',
                        onclick: function() {
                            ed.insertContent('[accordion]<br>\
                                        [accordion_item title=\"First Accordion Title\"]Accordion Content Here[/accordion_item]<br>\
                                        [accordion_item title=\"Second Accordion Title\"]Accordion Content Here[/accordion_item]<br>\
                                        [accordion_item title=\"Third Accordion Title\"]Accordion Content Here[/accordion_item]<br>\
                                        [/accordion]');
                        }
                    },
                    {
                        text: 'Callout Box',
                        onclick: function() {
                            ed.insertContent('[callout title=\"CALLOUT TITLE HERE\" btn_title=\"BUTTON TITLE HERE\" btn_url=\"BUTTON URL LINK HERE(Ex:http://)\"]YOUR CALLOUT DESCRIPTION COMES HERE![/callout]');
                        }
                    },
                    {
                        text: 'Clents Box',
                        onclick: function() {
                            ed.insertContent('[clients_box]<br>\
                                        [client logo=\"CLIENT LOGO LINK HERE\" url=\"#\" title=\"Client Title Here\"]<br>\
                                        [client logo=\"CLIENT LOGO LINK HERE\" url=\"#\" title=\"Client Title Here\"]<br>\
                                        [client logo=\"CLIENT LOGO LINK HERE\" url=\"#\" title=\"Client Title Here\"]<br>\
                                        [client logo=\"CLIENT LOGO LINK HERE\" url=\"#\" title=\"Client Title Here\"]<br>\
                                        [client logo=\"CLIENT LOGO LINK HERE\" url=\"#\" title=\"Client Title Here\"]<br>\
                                        [client logo=\"CLIENT LOGO LINK HERE\" url=\"#\" title=\"Client Title Here\"]<br>\
                                        [client logo=\"CLIENT LOGO LINK HERE\" url=\"#\" title=\"Client Title Here\"]<br>\
                                        [client logo=\"CLIENT LOGO LINK HERE\" url=\"#\" title=\"Client Title Here\"]<br>\
                                        [/clients_box]');
                        }
                    },
                    // Columns Array
                    {
                        text: 'Columns',
                        menu: [
                                {
                                    text: 'One Half',
                                    onclick: function() {
                                        ed.insertContent('[one_half]Your Content Here[/one_half]');
                                    }
                                },
                                {
                                    text: 'One Half Last',
                                    onclick: function() {
                                        ed.insertContent('[one_half_last]Your Content Here[/one_half_last]');
                                    }
                                },
                                {
                                    text: 'One Third',
                                    onclick: function() {
                                        ed.insertContent('[one_third]Your Content Here[/one_third]');
                                    }
                                },
                                {
                                    text: 'One Third Last',
                                    onclick: function() {
                                        ed.insertContent('[one_third_last]Your Content Here[/one_third_last]');
                                    }
                                },
                                {
                                    text: 'One Fourth',
                                    onclick: function() {
                                        ed.insertContent('[one_fourth]Your Content Here[/one_fourth]');
                                    }
                                },
                                {
                                    text: 'One Fourth Last',
                                    onclick: function() {
                                        ed.insertContent('[one_fourth_last]Your Content Here[/one_fourth_last]');
                                    }
                                },
                                {
                                    text: 'One Fifth',
                                    onclick: function() {
                                        ed.insertContent('[one_fifth]Your Content Here[/one_fifth]');
                                    }
                                },
                                {
                                    text: 'One Fifth Last',
                                    onclick: function() {
                                        ed.insertContent('[one_fifth_last]Your Content Here[/one_fifth_last]');
                                    }
                                },
                                {
                                    text: 'One Sixth',
                                    onclick: function() {
                                        ed.insertContent('[one_sixth]Your Content Here[/one_sixth]');
                                    }
                                },
                                {
                                    text: 'One Sixth Last',
                                    onclick: function() {
                                        ed.insertContent('[one_sixth_last]Your Content Here[/one_sixth_last]');
                                    }
                                },
                                {
                                    text: 'Two Third',
                                    onclick: function() {
                                        ed.insertContent('[two_third]Your Content Here[/two_third]');
                                    }
                                },
                                {
                                    text: 'Two Third Last',
                                    onclick: function() {
                                        ed.insertContent('[two_third_last]Your Content Here[/two_third_last]');
                                    }
                                },
                                {
                                    text: 'Two Fifth',
                                    onclick: function() {
                                        ed.insertContent('[two_fifth]Your Content Here[/two_fifth]');
                                    }
                                },
                                {
                                    text: 'Two Fifth Last',
                                    onclick: function() {
                                        ed.insertContent('[two_fifth_last]Your Content Here[/two_fifth_last]');
                                    }
                                },
                                {
                                    text: 'Three Fourth',
                                    onclick: function() {
                                        ed.insertContent('[three_fourth]Your Content Here[/three_fourth]');
                                    }
                                },
                                {
                                    text: 'Three Fourth Last',
                                    onclick: function() {
                                        ed.insertContent('[three_fourth_last]Your Content Here[/three_fourth_last]');
                                    }
                                },                  
                                {
                                    text: 'Three Fifth',
                                    onclick: function() {
                                        ed.insertContent('[three_fifth]Your Content Here[/three_fifth]');
                                    }
                                },
                                {
                                    text: 'Three Fifth Last',
                                    onclick: function() {
                                        ed.insertContent('[three_fifth_last]Your Content Here[/three_fifth_last]');
                                    }
                                },              
                                {
                                    text: 'Four Fifth',
                                    onclick: function() {
                                        ed.insertContent('[four_fifth]Your Content Here[/four_fifth]');
                                    }
                                },
                                {
                                    text: 'Four Fifth Last',
                                    onclick: function() {
                                        ed.insertContent('[four_fifth_last]Your Content Here[/four_fifth_last]');
                                    }
                                },                  
                                {
                                    text: 'Five Sixth',
                                    onclick: function() {
                                        ed.insertContent('[five_sixth]Your Content Here[/five_sixth]');
                                    }
                                },
                                {
                                    text: 'Five Sixth Last',
                                    onclick: function() {
                                        ed.insertContent('[five_sixth_last]Your Content Here[/five_sixth_last]');
                                    }
                                }
                        ]
                    },
                    {
                        text: 'Google Map',
                        onclick: function() {
                            ed.insertContent('[map url=\"GOOGLEMAP_URL_HERE\" width=\"100%\" height=\"330px\"]');
                        }
                    },
                    // Helpers Array
                    {
                        text: 'Helpers',
                        menu: [
                            {
                                text: 'Break',
                                onclick: function() {
                                    ed.insertContent('[br]');
                                }
                            },
                            {
                                text: 'Clear',
                                onclick: function() {
                                    ed.insertContent('[clear]');
                                }
                            },  
                            {
                                text: 'Space',
                                onclick: function() {
                                    ed.insertContent('[space]');
                                }
                            }
                        ]
                    },
                    {
                        text: 'Pricing Table',
                        onclick: function() {
                            ed.insertContent('[pricing_table columns=\"4\"]<br>\
[pricing_column title=\"Column Title\" highlight=\"false\" highlight_reason=\"Most Popular or Featured\" price=\"99\" currency_symbol=\"$\" interval=\"per month\" button_link=\"#\" button_text=\"Buy Now\"]\
<ul class=\"features\"><li>Free Setup</li><li>20GB Storage</li><li>25 plugins</li><li>Basic Stats</li><li>Basic Customization</li></ul><br>\
[/pricing_column]<br>\
[pricing_column title=\"Column Title\" highlight=\"true\" highlight_reason=\"Most Popular or Featured\" price=\"99\" currency_symbol=\"$\" interval=\"per month\" button_link=\"#\" button_text=\"Buy Now\"]\
<ul class=\"features\"><li>Free Setup</li><li>20GB Storage</li><li>25 plugins</li><li>Basic Stats</li><li>Basic Customization</li></ul><br>\
[/pricing_column]<br>\
[pricing_column title=\"Column Title\" highlight=\"false\" highlight_reason=\"Most Popular or Featured\" price=\"99\" currency_symbol=\"$\" interval=\"per month\" button_link=\"#\" button_text=\"Buy Now\"]\
<ul class=\"features\"><li>Free Setup</li><li>20GB Storage</li><li>25 plugins</li><li>Basic Stats</li><li>Basic Customization</li></ul><br>\
[/pricing_column]<br>\
[pricing_column title=\"Column Title\" highlight=\"false\" highlight_reason=\"Most Popular or Featured\" price=\"99\" currency_symbol=\"$\" interval=\"per month\" button_link=\"#\" button_text=\"Buy Now\"]\
<ul class=\"features\"><li>Free Setup</li><li>20GB Storage</li><li>25 plugins</li><li>Basic Stats</li><li>Basic Customization</li></ul><br>\
[/pricing_column]<br>\
[/pricing_table]');
                        }
                    },
                    {
                        text: 'Social Sharing',
                        onclick: function() {
                            ed.insertContent('[social_box]<br>\
                                        [social_icon icon=\"duckduckgo\" url=\"#\"]<br>\
                                        [social_icon icon=\"aim\" url=\"#\"]<br>\
                                        [social_icon icon=\"delicious\" url=\"#\"]<br>\
                                        [social_icon icon=\"paypal\" url=\"#\"]<br>\
                                        [social_icon icon=\"flattr\" url=\"#\"]<br>\
                                        [social_icon icon=\"android\" url=\"#\"]<br>\
                                        [social_icon icon=\"eventful\" url=\"#\"]<br>\
                                        [social_icon icon=\"smashmag\" url=\"#\"]<br>\
                                        [social_icon icon=\"gplus\" url=\"#\"]<br>\
                                        [social_icon icon=\"wikipedia\" url=\"#\"]<br>\
                                        [social_icon icon=\"lanyrd\" url=\"#\"]<br>\
                                        [social_icon icon=\"calendar\" url=\"#\"]<br>\
                                        [social_icon icon=\"stumbleupon\" url=\"#\"]<br>\
                                        [social_icon icon=\"fivehundredpx\" url=\"#\"]<br>\
                                        [social_icon icon=\"pinterest\" url=\"#\"]<br>\
                                        [/social_box]');
                        }
                    },
                    {
                        text: 'Tabs',
                        onclick: function() {
                            ed.insertContent('[tabgroup]<br>\
                                        [tab title=\"Tab Title Here\"]Tabs Content Here[/tab]<br>\
                                        [tab icon=\"icon-home(Check Font awesomes for Icon Class Names)\"]Tabs Content Here[/tab]<br>\
                                        [tab title=\"Tab Title Here\" icon=\"icon-home(Check Font awesomes for Icon Class Names)\"]Tabs Content Here[/tab]<br>\
                                        [/tabgroup]');
                        }
                    },
                    {
                        text: 'Team Member',
                        onclick: function() {
                            ed.insertContent('[team_member img=\"IMAGE_LINK_HERE\" name=\"MEMBER_NAME\" role=\"MEMBER_ROLE\" facebook=\"#\" twitter=\"#\" google=\"#\"]TEAM MEMBER DESCRIPTION HERE[/team_member]');
                        }
                    },
                    {
                        text: 'Toggles',
                        onclick: function() {
                            ed.insertContent('[toggle title=\"First Toggle Title\" open=\"0\"]YOUR TOGGLE CONTENT HERE![/toggle]<br>\
                                    [toggle title=\"Second Toggle Title(Open by Default)\" open=\"1\"]YOUR TOGGLE CONTENT HERE![/toggle]<br>\
                                    [toggle title=\"Third Toggle Title\" open=\"0\"]YOUR TOGGLE CONTENT HERE![/toggle]');
                        }
                    },
                    // Typo Elements Array
                    {
                        text: 'Typo Elements',
                        menu: [
                            {
                                text: 'Milestone Box', 
                                onclick: function() {
                                    ed.insertContent('[milestone_box icon=\"icon-heart(Check Font Awesome for Icon Classes)\" count=\"500\" title=\"Pizzas\"]');
                                }
                            },
                            {
                                text: 'Fancy Header', 
                                onclick: function() {
                                    ed.insertContent('[fancy_header]Your Fancy Header Title Here![/fancy_header]');
                                }
                            },
                            {
                                text: 'Pullquote', 
                                onclick: function() {
                                    ed.insertContent('[pullquote align=\"left or right\"]Your Pullquote Text Here![/pullquote]');
                                }
                            },
                            {
                                text: 'BlockQuote', 
                                onclick: function() {
                                    ed.insertContent('[blockquote]Your Blockquote Text Here![/blockquote]');
                                }
                            },
                            {
                                text: 'Service Boxes', 
                                onclick: function() {
                                    ed.insertContent('[service_box icon=\"icon-tablet(Check Font Awesome for Icon Classes)\" title=\"Service Box Title Here\"]SERvICE BOX CONTENT HERE[/service_box]');
                                }
                            },
                            {
                                text: 'Skill Bar', 
                                onclick: function() {
                                    ed.insertContent('[skill_bar percentage=\"50\" title=\"Web Design\"]<br>\
                                            [skill_bar percentage=\"30\" title=\"UX Design\"]<br>\
                                            [skill_bar percentage=\"80\" title=\"Brand Package\"]<br>\
                                            [skill_bar percentage=\"70\" title=\"WordPress\"]');
                                }
                            },
                            {
                                text: 'Testimonials', 
                                onclick: function() {
                                    ed.insertContent('[testimonial img=\"TESTIMONIAL_AUTHOR_IMAGE\" author_info=\"AUTHOR NAME, AFFILIATION\"]TESTIMONIAL HERE!![/testimonial]"');
                                }
                            }
                        ]
                    },
                    {
                        text: 'Video',
                        onclick: function() {
                            ed.insertContent('[video type=\"youtube,vimeo\" id=\"YOUTUBE_ID or VIMEO_ID here\" autoplay=\"yes,no\"]');
                        }
                    }

                ],

    });

});


